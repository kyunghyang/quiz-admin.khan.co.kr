<?php

namespace App\Nova\Actions;

use App\Enums\OrderState;
use App\Enums\OutgoingState;
use App\Models\Iamport;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

class CancelOrder extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function name()
    {
        return __("CancelOrder");
    }

    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            if($model->state === OrderState::SUCCESS){
                try {
                    if(!$model->can_cancel)
                        return Action::danger("상품준비중인 상품은 주문취소할 수 없습니다.");

                    $accessToken = Iamport::getAccessToken();

                    DB::beginTransaction();

                    $model->update(["state" => OrderState::REFUND]);

                    $model->outgoings()->update([
                        "state" => OutgoingState::FAIL
                    ]);

                    Iamport::cancel($accessToken, $model->imp_uid);

                    $model->refunds()->create([
                        "user_id" => $model->user_id,
                        "reason_request" => "주문취소",
                        "refunded" => 1,
                        "price" => $model->price_real,
                        "type" => "주문취소"
                    ]);

                    DB::commit();
                }catch(\Exception $e) {
                    // $order->update(["state" => OrderState::FAIL]);


                    DB::rollBack();

                    return Action::danger("주문취소 기간이 지났습니다. 직접 계좌환불로 진행해주세요.");
                }
            }
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
