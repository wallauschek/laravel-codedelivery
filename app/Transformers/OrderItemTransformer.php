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

    protected $defaultIncludes = [
        'product'
    ];

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

    public function includeProduct(OrderItem $model){
        if (!$model->product) {
            return null;
        }
        return $this->item($model->product, new ProductTransformer());
    }
}
