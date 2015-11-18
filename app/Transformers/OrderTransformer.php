<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Order;

/**
 * Class OrderTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderTransformer extends TransformerAbstract
{

//     protected $defaultIncludes = [
//         'cupom',
//         'items'
//     ];
    protected $availableIncludes = [
        'cupom',
        'items',
        'client',
        'deliveryman'
    ];

    /**
     * Transform the \Order entity
     * @param \Order $model
     *
     * @return array
     */
    public function transform(Order $model)
    {
        return [
            'id'        => (int) $model->id,
            'total'     => (float) $model->total,
            'status'    => (int) $model->status,
            'created_at' => $model->created_at
        ];
    }

    public function includeCupom(Order $model){
        if (!$model->cupom) {
            return null;
        }
        return $this->item($model->cupom, new CupomTransformer());
    }

    public function includeClient(Order $model){
        if (!$model->client) {
            return null;
        }
        return $this->item($model->client, new ClientTransformer());
    }

    public function includeDeliveryman(Order $model){
        if (!$model->deliveryman) {
            return null;
        }
        return $this->item($model->deliveryman, new DeliverymanTransformer());
    }

    public function includeItems(Order $model){
        return $this->collection($model->items, new OrderItemTransformer());
    }
}
