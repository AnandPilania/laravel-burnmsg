<?php

namespace AP\Burnmsg;

use Illuminate\Http\Request;
use App\Controllers\Controller as Base;

class Controller extends Base
{
	protected $repo;
	
	public function __construct(Contract $repo)
	{
		$this->repo = $repo;
	}
	
	public function create()
	{
        return view('burnmsg::partials.create');
	}

	public function store(Request $request)
    {
		$url = $this->repo->store($request->all());

        return view('burnmsg::partials.store', ['url' => $url]);
	}

	public function show(Request $request, $url, $key)
    {
        $fbua = [
            /*"facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)",
            "facebookexternalhit/1.1 (+https://www.facebook.com/externalhit_uatext.php)",
            "facebookexternalhit/1.0 (+http://www.facebook.com/externalhit_uatext.php)",
            "facebookexternalhit/1.0 (+https://www.facebook.com/externalhit_uatext.php)",
            "facebookexternalhit/1.2 (+http://www.facebook.com/externalhit_uatext.php)",
            "facebookexternalhit/1.2 (+https://www.facebook.com/externalhit_uatext.php)"*/
        ];

        return view('burnmsg::partials.show', ['body' => in_array($request->header('User-Agent'), $fbua) ? '' : $this->repo->destroy($url, $key)]);
	}

}