<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\OrdermItem;

/**
 * Class OrdermItemTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderItemTransformer extends TransformerAbstract
{

    /**
     * Transform the \OrdermItem entity
     * @param \OrdermItem $model
     *
     * @return array
     */
    public function transform(OrderItem $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
