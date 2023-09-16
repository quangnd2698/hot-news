<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function test()
    {
        $jsonData = '[
            {
                "id": "1",
                "name": "Navigation menu",
                "parent_id": null,
                "submenu": []
            },
            {
                "id": "2",
                "name": "Home and garden",
                "parent_id": "1",
                "submenu": []
            },
            {
                "id": "3",
                "name": "Cookers",
                "parent_id": "2",
                "submenu": []
            },
            {
                "id": "4",
                "name": "Microwave ovens",
                "parent_id": "2",
                "submenu": [
                    {
                        "name": "Web Design",
                        "url": "#"
                    },
                    {
                        "name": "Graphic Design",
                        "url": "#"
                    },
                    {
                        "name": "Social Media",
                        "url": "#"
                    }
                ]
            },
            {
                "id": "5",
                "name": "Fridges",
                "parent_id": "2",
                "submenu": [
                    {
                        "name": "Web Design",
                        "url": "#"
                    },
                    {
                        "name": "Graphic Design",
                        "url": "#"
                    },
                    {
                        "name": "Social Media",
                        "url": "#"
                    }
                ]
            },
            {
                "id": "6",
                "name": "PC peripherials",
                "parent_id": "1",
                "submenu": [
                    {
                        "name": "Web Design",
                        "url": "#"
                    },
                    {
                        "name": "Graphic Design",
                        "url": "#"
                    },
                    {
                        "name": "Social Media",
                        "url": "#"
                    }
                ]
            },
            {
                "id": "7",
                "name": "Head phones",
                "parent_id": "6",
                "submenu": [
                    {
                        "name": "Web Design",
                        "url": "#"
                    },
                    {
                        "name": "Graphic Design",
                        "url": "#"
                    },
                    {
                        "name": "Social Media",
                        "url": "#"
                    }
                ]
            },
            {
                "id": "8",
                "name": "Monitors",
                "parent_id": "6",
                "submenu": [
                    {
                        "name": "Web Design",
                        "url": "#"
                    },
                    {
                        "name": "Graphic Design",
                        "url": "#"
                    },
                    {
                        "name": "Social Media",
                        "url": "#"
                    }
                ]
            },
            {
                "id": "9",
                "name": "Network",
                "parent_id": "6",
                "submenu": [
                    {
                        "name": "Web Design",
                        "url": "#"
                    },
                    {
                        "name": "Graphic Design",
                        "url": "#"
                    },
                    {
                        "name": "Social Media",
                        "url": "#"
                    }
                ]
            },
            {
                "id": "10",
                "name": "Laptop bags",
                "parent_id": "6",
                "submenu": [
                    {
                        "name": "Web Design",
                        "url": "#"
                    },
                    {
                        "name": "Graphic Design",
                        "url": "#"
                    },
                    {
                        "name": "Social Media",
                        "url": "#"
                    }
                ]
            },
            {
                "id": "11",
                "name": "Web Cams",
                "parent_id": "6",
                "submenu": [
                    {
                        "name": "Web Design",
                        "url": "#"
                    },
                    {
                        "name": "Graphic Design",
                        "url": "#"
                    },
                    {
                        "name": "Social Media",
                        "url": "#"
                    }
                ]
            }
        ]';
        return view('site.home', ['menu' => json_decode($jsonData)]);
    }
}
