const dragStart = (event) => {
  event.dataTransfer.setData("text/plain", event.target.id);
}

const allowDrop = (event) => {
  event.preventDefault();
}


$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  }
 });

const drop = (event) => {
  event.preventDefault();
  const data = event.dataTransfer.getData("text/plain");
  const element = document.querySelector(`#${data}`);
  const cardId = event.target.getAttribute('data-card-id');
  const taskId = element.getAttribute('data-task-id');
  try {
    event.target.appendChild(element);
    let data = {'card_id' : cardId , 'task_id' : taskId};
    $.ajax({
        type: 'PUT',
        url: `/tasks/${taskId}`,
        contentType: 'application/json',
        data: JSON.stringify(data), // access in body
    }).fail(function (msg) {
        console.log('FAIL');
    });
  } catch (error) {
    console.warn("you can't move the item to the same place")
  }
}
