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
    protected $response;
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
            $this->notification('success', 'Successful!', 'Portfolio berhasil ditambah');
            return redirect()->route('portfolio.index');
        }
    }

    public function show($id)
    {
        $bcrum = $this->bcrum('Detail Portfolio', route('portfolio.index'), 'Portfolio');
        $portfolio = Portfolio::find($id);
        return view('backend.portfolio.show', compact('portfolio', 'bcrum'));
    }

    public function edit($id)
    {
        $bcrum = $this->bcrum('Edit Portfolio', route('portfolio.index'), 'Portfolio');
        $portfolio = Portfolio::find($id);
        return view('backend.portfolio.edit', compact('portfolio', 'bcrum'));
    }

    public function update(Request $request, $id)
    {
        $data = $this->handleRequest($request);
        $portfolio = Portfolio::findOrFail($id);
        $update = $portfolio->update($data);
        if ($update) {
            $this->notification('success', 'Successful!', 'Portfolio berhasil diubah');
            return redirect()->route('portfolio.index');
        }
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::where('id', $id)->first();
        $delete=$portfolio->delete();
        if($delete){
            $this->deleteImage($portfolio->thumbnail);
            // dd($portfolio);
            $this->notification('error', 'Successful!', 'Portfolio berhasil dihapus.');
            $result = [
                'result' => 'ok',
                'code'   => '200',
                'url'    => route('portfolio.index')
            ];
            
            return response()->json($result);
        }
        $result =[
            'result'    => 'false',
            'code'      => '500',
            'url'       => route('portfolio.index')
        ];
        return response()->json($result);
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
            $data['thumbnail'] = $fileName;
        }
        return $data;
    }

    public function deleteImage($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'img/thumbnail'
            . DIRECTORY_SEPARATOR . $filename;

        return File::delete($path);
    }
}
