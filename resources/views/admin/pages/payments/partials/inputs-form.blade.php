<div class="row">
 <!-- Preço -->
    <div class="col-md-6">
        <label for="preco" class="form-label">Preço</label>
        <input type="number" id="preco" placeholder="Valor a pagar..." name="price" class="form-control" min="5000" step="5000" required>
        <div class="form-text text-danger">O preço deve ser múltiplo de 5.000</div>
    </div>

    <div class="col-md-6">
        <label for="meses" class="form-label">Meses</label>
        <input type="number" id="meses" placeholder="Meses de uso..." name="month" class="form-control" readonly>
    </div>

    <div class="col-md-6">
        <label for="data_expiracao" class="form-label">Data de Expiração</label>
        <input type="date" id="data_expiracao" name="payment_expiration" class="form-control" readonly>
    </div>

    <!-- Upload do comprovativo -->
    <div class="col-md-6">
        <label for="comprovativo" class="form-label">Comprovativo (PDF)</label>
        <input type="file" id="comprovativo" name="file" class="form-control" accept="application/pdf" required>
    </div>
</div>