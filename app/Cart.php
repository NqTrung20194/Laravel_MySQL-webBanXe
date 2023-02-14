<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id, $a)
	{
		if ($a<=0) {
			$a=1;
		}

		if($item->promotion_price ==0)
			$giohang = ['qty'=>0, 'price' => $item->unit_price, 'item' => $item];
		else
			$giohang = ['qty'=>0, 'price' => $item->promotion_price, 'item' => $item];
		
		if($this->items)
		{
			if(array_key_exists($id, $this->items))
			{
				$giohang = $this->items[$id];
			}
		}

		
		
		$giohang['qty'] += $a;
		

		if ($item->promotion_price == 0)
			$price = $item->unit_price;
		else
			$price = $item->promotion_price;

		$giohang['price'] = $price * $giohang['qty'];
		$this->items[$id] = $giohang;
		$this->totalQty+=$a;
		$this->totalPrice += $price*$a;
	}
	//xóa 1
	public function reduceByOne($id){
		$qty = $this->items[$id]['qty'];
		$price_one = $this->items[$id]['price']/$qty;

		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $price_one ;
		$this->totalQty--;
		$this->totalPrice -= $price_one;
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
