# Simplifying the Api response

this package was built for easying the return of an api reponse, currently it returns only json,
but could easily support xml or whatever...

the use is easy:

      return $apiResponder
            ->setData(['someData'=>1, 'someData2'=>2])
            ->setMeta(['page'=>1, 'extra'=>'for_info_stuff'])
            ->setRef(1) //defaults to 1, this is for the general api code, like 0 success, 1 data error, 2 auth error etc
            ->respond(); //and this returns the "Response" object currently JsonResponse
