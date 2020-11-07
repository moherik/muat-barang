require('./bootstrap');

const toastSelector = '.toast';

$(toastSelector).toast({
    delay: 5000
})

$('.close-toast').on('click', function() {
    $(toastSelector).toast('hide')
})

Livewire.on('showModal', () => {
    $('.modal').modal('show');
});

Livewire.on('closeModal', () => {
    $('.modal').modal('hide');
})

Livewire.on('showToast', ({headerText, bodyText}) => {
    showToast(headerText, bodyText)
})

function showToast(headerText, bodyText) {
    $(toastSelector).find('.toast-header-label').text(headerText)
    $(toastSelector).find('.toast-body').text(bodyText)

    $(toastSelector).toast('show')
}