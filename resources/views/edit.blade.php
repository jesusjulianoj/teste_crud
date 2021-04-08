@extends('template.template')
@section('titulo', 'Editar Usuário')
@section('content')
<?php 
@session_start();

?>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{route('usuario.editar', $usuario)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="nome" value="{{$usuario->nome}}" class="form-control" placeholder="Nome Completo">
                    </div>
                    <div class="form-group">
                        <label>CPF</label>
                        <input type="text" id="cpf" name="cpf" value="{{$usuario->cpf}}" class="form-control" placeholder="CPF">
                    </div>
                    <div class="form-group">
                        <label>Data de Nascimento</label><?php
                        $newDateFormat2 = date('d-m-Y', strtotime($usuario->dt_nascimento)); ?>
                        <input type="text" id="dt_nasc" name="dt_nasc" value="{{$newDateFormat2}}" class="form-control" placeholder="Data de Nascimento">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" name="email" value="{{$usuario->email}}" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" id="telefone" name="telefone" value="{{$usuario->telefone}}" class="form-control" placeholder="Telefone">
                    </div>
                    <div class="form-group">
                        <label>Estado</label><?php
                            use App\Models\estado;
                            $lstEstado = estado::orderby('desc_estado', 'asc')->paginate(); ?>
                        <select class="form-control" name="estado" id="estadoEdit">
                            <option value="0">Não Selecionado</option>
                            @foreach($lstEstado as $item)
                                <option value="{{$item->id}}" <?php echo($usuario->id_estado == $item->id ? 'selected="selected"':'')?>>{{$item->desc_estado}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="dv_cidade">
                        <?php
                            use App\Models\cidade;
                            if($usuario->id_cidade){
                                //echo($usuario->id_cidade);

                                $lstCidade = cidade::where('id_estado', '=', $usuario->id_estado)->paginate(); ?>
                                <label>Cidade</label>
                                <select class="form-control" name="cidade" id="cidade">
                                    @foreach($lstCidade as $item)
                                        <option value="{{$item->id}}" <?php echo($usuario->id_cidade == $item->id ? 'selected="selected"':'')?>>{{$item->desc_cidade}}</option>
                                    @endforeach
                                </select><?php
                            } 
                        ?>
                        <!--<label>Cidade</label>
                        <input type="text" name="cidade" class="form-control">-->
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-danger" href="{{route('usuario.delete', $usuario)}}" role="button">Excluir</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection