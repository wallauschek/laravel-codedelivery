<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\OrderItem;

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
            'price'         => "R$". (float) $model->price,
            'qtd'           => (int) $model->qtd
        ];
    }
}
