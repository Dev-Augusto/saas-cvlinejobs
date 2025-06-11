<!-- Modal -->
<div class="modal fade" id="delete-cv{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i> Eliminar Currículo Vitae de <strong>{{$item->name}}</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      <div class="modal-body">
        <form action="{{route('admin.cv.delete',$item->id)}}" method="POST">
        @csrf
        @method('DELETE')
            <div class="text-center">
                Têns certeza que desejas eliminar o currículo vitae de <strong>{{$item->name}}</strong>?! 
            </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
    </form>
  </div>
</div>
</div>
