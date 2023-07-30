import { DATAMAIN } from './global.js';
var previousText = '';

$('#country_id').on('change', function () {
    $.ajax({
        url: DATAMAIN + '/cities-for-country',
        type: 'GET',
        data: {
            country_id: $(this).val()
        },
        success: function (response) {
            $('#city_id').empty();
            for (var i = 0; i < response.length; i++) {
                var city = response[i];
                $('#city_id').append($('<option>', {
                    value: city.id,
                    text: city.name
                }));
            }
        },
        error: function (error) {
            console.error(error);
        }
    });
})

$('#dni').on('blur', function () {
    $.ajax({
        url: DATAMAIN + '/validate-dni',
        type: 'GET',
        data: {
            dni: $(this).val()
        },
        success: function (response) {
            if (response === 1) {
                $('#dni').addClass('is-invalid');
                $('#dni').removeClass('is-valid');
                $('#dni').focus();
                $('#btn_new_employee').addClass('disabled');
            } else {
                $('#dni').addClass('is-valid');
                $('#dni').removeClass('is-invalid');
                $('#btn_new_employee').removeClass('disabled');
            }
        },
        error: function (error) {
            console.error(error);
        }
    });
})


$('#position_id').on('change', function () {
    var selectedText = $(this).find('option:selected').text();

    if (selectedText.includes('Presidente')) {
        $('#div_boss_id').addClass('d-none');
        $('#boss_id').val('');
    } else {
        $('#div_boss_id').removeClass('d-none');
    }
});

const checkAll = $('#check-all');
const checkRows = $('.check-row');
const btnDeleteSelected = $('#btn-delete-selected');
const selectedCount = $('#selected-count');
const selectedIdsInput = $('#selectedIdsInput');

let selectedIds = [];

function updateSelectedCount() {
    const count = selectedIds.length;
    selectedCount.removeClass('d-none');
    btnDeleteSelected.removeClass('d-none');
    selectedCount.text(count + (count === 1 ? ' elemento seleccionado' : ' elementos seleccionados'));
    if (count === 0) selectedCount.addClass('d-none') && btnDeleteSelected.addClass('d-none');
}

function updateDeleteButton() {
    btnDeleteSelected.toggle(selectedIds.length > 0);
}

function handleRowSelection() {
    selectedIds = checkRows.filter((index, row) => row.checked).map((index, row) => row.dataset.id).get();
    updateSelectedCount();
    updateDeleteButton();

    selectedIdsInput.val(selectedIds.join(','));
}

function handleCheckAll() {
    checkRows.prop('checked', checkAll.prop('checked'));
    handleRowSelection();
}

checkAll.on('change', handleCheckAll);

checkRows.on('change', handleRowSelection);

$('#btn-delete-selected').on('click', function () {
    Swal.fire({
        text: '¿Está seguro que desea eliminar los elementos seleccionados?',
        icon: 'warning',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#0e36ea',
        cancelButtonColor: '#d33',
        showCancelButton: true,
      }).then((result) => {
        if (result.isConfirmed) {
            $('#form_delete_several_employees').submit();
        }
      })
    
})