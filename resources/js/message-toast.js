import { Modal } from 'flowbite';

// set the modal menu element
const $targetModalLoading = document.getElementById('modalLoading');

// options with default values
const options = {
  placement: 'center-center',
  backdrop: 'static',
  backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-[60]',
  closable: false,
  onHide: () => {

  },
  onShow: () => {

  },
  onToggle: () => {

  }
};

var modalLoading = new Modal($targetModalLoading, options);


$('.clockUi-show').on('click', function(){
    modalLoading.show();
});

$('.form-clockUi-show').on('submit', function(){
    modalLoading.show();
});

$('.clockUi-close').on('click', function(){
    modalLoading.hide();
});
