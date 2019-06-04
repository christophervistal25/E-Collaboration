let cardAddTaskBtn = document.querySelector('#addTask');
let cardNeedToBeDone = document.querySelector('#card-need-to-be-done');

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  }
 });

cardAddTaskBtn.addEventListener('click' , () => {
    let input = document.createElement("input");
    input.setAttribute('class','form-control mt-2');
    input.setAttribute('type','text');
    input.setAttribute('placeholder','Task name here...');
    cardNeedToBeDone.appendChild(input);

    let parentCardId = cardNeedToBeDone.getAttribute('data-card-id');
    input.addEventListener('keypress', (event) => {
        if (event.keyCode == 13) {
            let data = {'name' : event.target.value, 'card_id' : parentCardId};
            $.ajax({
                type: 'POST',
                url: `/tasks`,
                contentType: 'application/json',
                data: JSON.stringify(data), // access in body
            }).done((data) => {
                let button = document.createElement("button");
                button.setAttribute('class','mt-2 btn btn-primary rounded-0 border-0 btn-block text-left btn-task');
                button.setAttribute('type','button');
                button.setAttribute('id',`list${data.id}`);
                button.setAttribute('draggable','true');
                button.setAttribute('ondragstart',"dragStart(event)");
                button.setAttribute('data-task-id',data.id);
                button.setAttribute('data-task-description',data.description);
                button.setAttribute('data-toggle','modal');
                button.setAttribute('data-target','#taskModal');

                // name of the task
                let textNode = document.createTextNode(data.name);

                button.appendChild(textNode);
                cardNeedToBeDone.removeChild(event.target);

                cardNeedToBeDone.appendChild(button);
            });
        }
    });
});
