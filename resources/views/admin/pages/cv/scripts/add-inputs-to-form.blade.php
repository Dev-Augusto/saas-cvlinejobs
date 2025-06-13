<script>
  function previewImagem(input) {
    const file = input.files[0];
    const preview = document.getElementById('preview');
    const icon = input.nextElementSibling.nextElementSibling;

    if (file) {
      preview.src = URL.createObjectURL(file);
      preview.style.display = "block";
      if (icon) icon.style.display = "none";
    }
  }
</script>

<script>
   let expCount = {{ isset($cv) ? $cv->experiencies->count() : 0 }};
   let skillCount = {{ isset($cv) ? $cv->habilities->count() : 0 }};
   let langCount = {{ isset($cv) ? $cv->languages->count() : 0}};

  function addExperience() {
    if (expCount >= 5) return;
    const container = document.getElementById('experience-container');
    container.insertAdjacentHTML('beforeend', `
      <div class="row g-3 mb-3 border-bottom pb-2">
        <div class="col-md-6"><input type="text" class="form-control" name="experiencias[${expCount}][empresa]" placeholder="Nome da empresa (Ex: CVLineJobs)"></div>
        <div class="col-md-6"><input type="text" class="form-control" name="experiencias[${expCount}][cargo]" placeholder="Cargo ou função (Ex: Designer Gráfico)"></div>
        <div class="col-md-6"><input type="text" class="form-control" name="experiencias[${expCount}][inicio]" placeholder="Ano de início (Ex: 2022)"></div>
        <div class="col-md-6"><input type="text" class="form-control" name="experiencias[${expCount}][fim]" placeholder="Ano de término ou atual"></div>
        <div class="col-12"><textarea class="form-control" name="experiencias[${expCount}][descricao]" placeholder="Descreva as atividades desenvolvidas..."></textarea></div>
      </div>
    `);
    expCount++;
  }

  function addSkill() {
    if (skillCount >= 5) return;
    const container = document.getElementById('skills-container');
    container.insertAdjacentHTML('beforeend', `
      <div class="mb-3">
        <input type="text" class="form-control" name="habilidades[]" placeholder="Ex: HTML, Comunicação, Liderança">
      </div>
    `);
    skillCount++;
  }

  function addLanguage() {
    if (langCount >= 5) return;
    const container = document.getElementById('language-container');
    container.insertAdjacentHTML('beforeend', `
      <div class="row g-3 mb-3">
        <div class="col-md-6">
          <input type="text" class="form-control" name="idiomas[${langCount}][nome]" placeholder="Ex: Inglês, Espanhol">
        </div>
        <div class="col-md-6">
          <select class="form-select" name="idiomas[${langCount}][nivel]">
            <option selected disabled>Nível de proficiência</option>
            <option value="básico">Básico</option>
            <option value="intermediário">Intermediário</option>
            <option value="avançado">Avançado</option>
            <option value="fluente">Fluente</option>
          </select>
        </div>
      </div>
    `);
    langCount++;
  }

  @if(!isset($cv))
    // Campos iniciais
    addExperience();
    addSkill();
    addLanguage();
  @endif
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const idiomaLinks = document.querySelectorAll('#idioma-selector .nav-link');
    const idiomaInput = document.getElementById('idioma_cv');

    idiomaLinks.forEach(link => {
        link.addEventListener('click', function () {
            // Remove a classe 'active' de todos os itens
            idiomaLinks.forEach(el => el.classList.remove('active'));

            // Adiciona a classe 'active' ao item clicado
            this.classList.add('active');

            // Atualiza o valor do input oculto com o idioma selecionado
            const idiomaSelecionado = this.getAttribute('data-idioma');
            idiomaInput.value = idiomaSelecionado;
        });
    });
});
</script>
