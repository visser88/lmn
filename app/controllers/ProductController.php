<?php

class ProductController extends BaseController {

	protected $layout = 'layouts.default';



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$products = Product::paginate(6);

		if(Request::ajax()){
			return Response::json(View::make('elements.productList')->with('products', $products)->render());
		}

		$this->layout->content = View::make('products.index')->nest('productList', 'elements.productList', array('products' => $products));
	}


	/**
	 * Show the product chart.
	 *
	 * @return Response
	 */
	public function chart()
	{
		$products = Product::all();
		return View::make('products.chart')->with('products', $products);
	}


	/**
	 * Updates product catelog via lemonstand store
	 *
	 *
	 * @return Response
	 */
	public function update()
	{
		$ch = curl_init();
		$curlConfig = array(
			CURLOPT_URL => 'https://waller.lemonstand.com/api/v2/products',
			CURLOPT_RETURNTRANSFER => true,
			
		);

		curl_setopt_array($ch, $curlConfig);
		$res = curl_exec($ch);
		curl_close($ch);

		$results = json_decode($res, true);

		Log::info($results);

		$saved = true;
		
		foreach($results['data'] as $result){
			$prod = Product::firstOrNew(array('name' => $result['name']));
			$prod->name = $result['name'];
			$prod->sku = $result['title'];
			$prod->sku = $result['sku'];
			$prod->description = $result['description'];
			$prod->short_description = $result['short_description'];
			$prod->meta_description = $result['meta_description'];
			$prod->meta_keywords = $result['meta_keywords'];
			$prod->url_name = $result['url_name'];
			$prod->base_price = $result['base_price'];
			$prod->cost = $result['cost'];
			$prod->enabled = $result['enabled'];
			$prod->is_on_sale = $result['is_on_sale'];
			$prod->sale_price_or_discount = $result['sale_price_or_discount'];
			$prod->in_stock_amount = $result['in_stock_amount'];
			$prod->created_by = $result['created_by'];
			$prod->updated_by = $result['updated_by'];
			$saved = $saved && $prod->save();
		}

		if($saved){
			return Response::json(array('success' => true, 'msg' => 'Products Updated'));
		}
		else return Response::json(array('success' => false, 'msg' => 'Error: Products could not be updated.'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
