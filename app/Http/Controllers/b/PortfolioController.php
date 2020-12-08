<?php

namespace App\Http\Controllers\b;

use App\Http\Controllers\b\BackendController;
use Illuminate\Http\Request;
use illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use File;

class PortfolioController extends BackendController
{
    public function index(Request $request)
    {
        $bcrum = $this->bcrum('Portfolio');
        $portfolios = Portfolio::paginate($this->limit);
        $portfolios = Portfolio::where(function ($query) use ($request) {
            if ($search = $request->get('search')) {
                $keywords = "%$search%";
                $query->where("nama", "LIKE", $keywords);
            }
        })->paginate($this->limit);
        return view('backend.portfolio.index', compact('bcrum', 'portfolios'));
    }

    public function create()
    {
        $bcrum = $this->bcrum('create', route('portfolio.index'), 'Portfolio');
        return view('backend.portfolio.create', compact('bcrum'));
    }

    public function store(PortfolioRequest $request)
    {
        $data = $this->handleRequest($request);
        $create = Portfolio::create($data);
        if ($create) {

            // $this->notification('success', 'Successful!', 'Portfolio berhasil ditambah');

            // $redirect = ($request->has('stay')) ? 'frame.create' : 'frame.index';

            return redirect()->route('portfolio.index');
        }
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function handleRequest($request)
    {
        $data = $request->all();
        $slug = ($request->slug != null) ? Str::slug($request->slug, '-') : Str::slug($request->nama, '-');

        if ($request->has('thumbnail')) {
            $thumbnail   = $request->file('thumbnail');
            $extension   = $thumbnail->guessClientExtension();
            $fileName    = 'img_' . $slug . '_' . date('dmy_His') . '.' . $extension;
            $destination = public_path() . '/img/thumbnail';
            Image::make($thumbnail->getRealPath())
                ->save($destination . "/" . $fileName);
            $data['slug'] = $slug;
            $data['thumbnail']       = $fileName;
        }
        return $data;
    }
}
