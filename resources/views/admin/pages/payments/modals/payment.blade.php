<!-- Modal -->
<div class="modal fade" id="payment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-lg modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-money"></i> Efectuar Pagamento da <strong>Licença de Uso</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('admin.payment.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
           @include('admin.pages.payments.partials.inputs-form')
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
    </form>
  </div>
</div>