/**	 * Passa os dados do cliente para o Modal, e atualiza o link para exclusão	 */
	$('#delete-modal').on('show.bs.modal', function (event) {
	   var button = $(event.relatedTarget);
	   var id = button.data('id');

	   var modal = $(this);
	   modal.find('.modal-title').text('Excluir Projeto #' + id);
	   modal.find('#confirm').attr('href', 'delete.php?id=' + id);
})

<a class="btn btn-outline-danger"id="myBtn"><i class="far fa-trash-alt mr-2" style="font-size: 20px"></i>Remover