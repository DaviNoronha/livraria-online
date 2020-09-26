@extends('adminlte::page')

@section('title', 'Formulário de livro')

@section('content_header')
  <h1>Formulário de Livro</h1>
@stop

@section('content')
    <div class="card card-primary">
        @if (isset($livro))
          {!! Form::model($livro, ['url' => route('restrito.livros.update', $livro), 'method' => 'put']) !!}
        @else
          {!! Form::open(['url' => route('restrito.livros.store')]) !!}
        @endif
          <div class="card-body">
            <div class="form-group">
              {!! Form::label('nome', 'Nome') !!}
              {!! Form::text('nome', null, ['class' => 'form-control']) !!}
              @error('nome')
                  <small class="form-text text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              {!! Form::label('paginas', 'Páginas') !!}
              {!! Form::number('paginas', null, ['class' => 'form-control']) !!}
              @error('paginas')
                  <small class="form-text text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              {!! Form::label('capa', 'Capa') !!}
              {!! Form::file('capa', null, ['class' => 'form-control', $livro ?? 'required']) !!}
              @error('capa')
                  <small class="form-text text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              {!! Form::label('descricao', 'Descrição') !!}
              {!! Form::textarea('descricao', null, ['class' => 'form-control', 'rows' => 2]) !!}
              @error('descricao')
                  <small class="form-text text-danger">{{ $message }}</small>
              @enderror
            </div>


            <div class="form-group">
              {!! Form::label('autor', 'Autor(es)') !!}
              {!! Form::select('autor[]', [], null, ['class' => 'form-control', 'id' => 'select-autor']) !!}
              @error('autor')
                  <small class="form-text text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
                {!! Form::label('valor', 'Valor') !!}
                {!! Form::number('valor', null, ['class' => 'form-control']) !!}
                @error('valor')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="card-footer">
              {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
              {!! link_to_route('restrito.livros.index', 'Voltar', null, ['class' => 'btn btn-secondary']) !!}
            </div>
      {!! Form::close() !!}
    </div>
@stop

@section('css')
@stop

@section('js')
    <script>
      $('#select-autor').select2({
        placeholder: 'Lista de autores',
        multiple:true,
        ajax: {
          url: '{{ route('restrito.lista.autores') }}',
          dataType: 'json',
          
          data: function (params) {
            return {
              searchTerm: params.term
            };
          },

          processResults: function (response) {
            return {
              results: response
            };
          },
        }
      });
    </script>
@stop
