<!-- Modal -->
<div class="modal fade" id="view-payment{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-lg modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-money"></i> Comprovativo de Pagamento <strong>{{  $company->name }}</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      <div class="modal-body">
            <iframe src="{{ asset('adm/img/comprovatives/'.$item->comprovative) }}" frameborder="0" width="100%"
                height="300px"></iframe>
     </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        @if(!(strtolower($item->status) == "activa"))
            <a href="{{ route('admin.payment.validated', $item->id) }}" class="btn btn-primary">Confirmar</a>
        @endif
    </div>
  </div>
</div>
