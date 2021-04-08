@extends('template.template')
@section('titulo', 'Inserir Usuário')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{route('insert')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control" placeholder="Nome Completo">
                    </div>
                    <div class="form-group">
                        <label>CPF</label>
                        <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF">
                    </div>
                    <div class="form-group">
                        <label>Data de Nascimento</label>
                        <input type="text" id="dt_nasc" name="dt_nasc" class="form-control" placeholder="Data de Nascimento">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" name="email" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Telefone">
                    </div>
                    <div class="form-group">
                        <label>Estado</label><?php
                            use App\Models\estado;
                            $lstEstado = estado::orderby('desc_estado', 'asc')->paginate(); ?>
                        <select class="form-control" name="estado" id="estado">
                            <option value="0">Não Selecionado</option>
                            @foreach($lstEstado as $item)
                                <option value="{{$item->id}}">{{$item->desc_estado}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="dv_cidade">
                        <!--<label>Cidade</label>
                        <input type="text" name="cidade" class="form-control">-->
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection