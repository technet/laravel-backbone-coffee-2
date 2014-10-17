<?php

class CategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json(Category::all());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return Response::json(['error' => 'Not found'],404);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Request::isJson()) 
		{
			$dbCat = new Category();
			$dbCat->code = Input::get('code');
			$dbCat->name = Input::get('name');
			$dbCat->save();		
			return Response::json($dbCat);
		}
		else
		{
			return Response::json(['error' => 'Invalid format'],400); 
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = Category::find($id);
		if (is_null($category))
		{
			return Response::json(['error' => 'Not found'],404);

		}
		else
		{
			return Response::json($category);
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
                if (Request::isJson()) 
                {
			$dbCat = Category::find($id);
	                if (is_null($dbCat))
        	        {
                	        return Response::json(['error' => 'Not found'],404);
	                }

                        $dbCat->code = Input::get('code');
                        $dbCat->name = Input::get('name');
                        $dbCat->save();         
                        return Response::json($dbCat);
                }
                else
                {
                        return Response::json(['error' => 'Invalid format'],400); 
                }
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Category::destroy($id);
		return Response::json(['error' => ''],200);		// Success
	}


}
