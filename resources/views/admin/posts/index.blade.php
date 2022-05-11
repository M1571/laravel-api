@extends('layouts.app')

@section('content')

    <div class="container">

        <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">Nuovo post</a>

    </div>

    <div class="container">

        <table class="table">

            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tags</th>
                <th scope="col">Ultima modifica</th>
                <th scope="col">Data creazione</th>
                <th scope="col"></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->category ? $post->category->name : '-' }}</td>
                    <td>
                      @foreach( $post->tags as $tag )
                        <span class="badge badge-pill badge-info">{{ $tag->name }}</span>
                      @endforeach
                    </td>
                    <td>{{ $post->updated_at ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$post->updated_at)->locale('it-IT')->diffForHumans() : '' }}</td>
                    <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$post->created_at)->format('d/m/Y') }}</td>
                    <td class="d-flex" style="gap: 0.8rem;">
                        <a class="btn btn-small btn-warning" href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
              @endforeach
            </tbody>

          </table>

    </div>

@endsection