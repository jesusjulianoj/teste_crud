@extends('template.template')
@section('titulo', 'Lista de Usuários')
@section('content')
<?php 
  use App\Models\usuario;
  use App\Models\estado;
  use App\Models\cidade;

  if(!isset($idUsuarioDelete)){
    $idUsuarioDelete = "";
  }
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Dt Nascimento</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th class="text-right">
                                <div>
                                    <a href="{{route('insere')}}"><i class="fas fa-plus" title="Adicionar Usuário"></i></a>&nbsp;
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuario as $lstUser)
                        <tr>
                            <td>{{$lstUser->nome}}</td>
                            <td><script>formataCPF({{$lstUser->cpf}});</script></td>
                            <td><?php
                                $date = new DateTime($lstUser->dt_nascimento);
                                echo $date->format('d/m/Y'); ?></td>
                            <td>{{$lstUser->email}}</td>
                            <td><script>formataTelefone({{$lstUser->telefone}});</script></td>
                            <?php
                        
                                if($lstUser->id_cidade){
                                    
                                    $lstCidade = cidade::where('id', '=', $lstUser->id_cidade)->paginate(); ?>
                                    @foreach($lstCidade as $item)
                                        <td>{{$item->desc_cidade}}</td>
                                    @endforeach <?php
                                } else {?>
                                    <td>&nbsp;</td><?php
                                } ?>
                            <?php
                                if($lstUser->id_estado){
                                    
                                    $lstEstado = estado::where('id', '=', $lstUser->id_estado)->paginate(); ?>
                                    @foreach($lstEstado as $item)
                                        <td>{{$item->desc_estado}}</td>
                                    @endforeach <?php
                                } else {?>
                                    <td>&nbsp;</td><?php
                                } ?>
                            <td class="text-right">
                                <div>
                                    <a href="{{route('usuario.edit', $lstUser)}}" class="text-muted"><i class="fas fa-pen" title="Editar Registro"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach <?php
                        if($QtdUsuario == 0){?>
                            <tr>
                                <td colspan="8">Não existem registros cadastrados!</td>
                            </tr><?php
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja Realmente Excluir este Registro?
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <form method="post" action="{{route('usuario.delete', $idUsuarioDelete)}}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection