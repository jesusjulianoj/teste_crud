function formataCPF(cpf){
  var cpfNovo = String(cpf).replace(/[^\d]/g, "");

  //realizar a formatação...
  var cpfFormat = String(cpfNovo).replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
  document.write(cpfFormat);
}

function formataTelefone(telefone){
  var telefoneNovo = String(telefone).replace(/[^\d]/g, "");

  //realizar a formatação...
  var telefoneFormat = String(telefoneNovo).replace(/(\d{2})(\d{1})(\d{4})(\d{4})/, "($1) $2 $3 $4");
  document.write(telefoneFormat);
}
