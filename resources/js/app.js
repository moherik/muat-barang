require('./bootstrap');

// Modal function
const modalSelector = $('.modal');

Livewire.on('showModal', () => {
    modalSelector.modal('show');
});

Livewire.on('closeModal', () => {
    modalSelector.modal('hide');
})

modalSelector.on('hide.bs.modal', () => {
    Livewire.emit('resetPropValue');
})


// Toast function
const toastSelector = $('.toast');

toastSelector.toast({delay: 5000})

Livewire.on('showToast', ({headerText, bodyText}) => {
    showToast(headerText, bodyText)
})

function showToast(headerText, bodyText) {
    toastSelector.find('.toast-header-label').text(headerText)
    toastSelector.find('.toast-body').text(bodyText)

    toastSelector.toast('show')
}

$('.close-toast').on('click', function() {
    toastSelector.toast('hide')
})

// trigger logout form
$('#logoutHref').on('click', function(e) {
    e.preventDefault();
    $('#logoutForm').submit();
})