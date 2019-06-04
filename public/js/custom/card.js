let selectedCard;
const btnAddNewCard = document.querySelector('#btnAddNewCard');
const cardsContainer = document.querySelector('#cards-container');
let boardId = 0;



$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
  }
 });

$(document).on('click','.addTask', (event) => {

    let cardId = `#card-${event.target.getAttribute('refer-to').replace(/\s+/g,"-")
                                                              .toLowerCase()}`;

    let selectedCard = document.querySelector(cardId);
    if (selectedCard == null) {
        selectedCard = document.getElementById(cardId);
    }

    let input = document.createElement('input');

    input.setAttribute('class','form-control mt-2');
    input.setAttribute('type','text');
    input.setAttribute('placeholder','Task name here...');

    selectedCard.appendChild(input);

    input.addEventListener('focus', (event) => {
        selectedCard = document.getElementById(`${event.target.parentNode.id}`);
        parentCardId = selectedCard.getAttribute('data-card-id');
    });




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

                // Removing the input field.
                event.target.remove();

                selectedCard.appendChild(button);
            });
        }
    });

});


let dynamicCardIndex = 0;
btnAddNewCard.addEventListener('click' , (event) => {
    dynamicCardIndex++;
    // Get the current board id.
    boardId = event.target.getAttribute('data-board-id');

    $('#cards-container').append(`
    <div  class="card shadow mb-4 droppable col-md-4" ondragover="allowDrop(event)" ondrop="drop(event)">
        <div id="card-header" class="card-header py-3 d-flex flex-row align-items-center justify-content-between" >
            <h6 class="m-0 font-weight-bold text-primary" id="card-name${dynamicCardIndex}">
            </h6>
            <input onkeypress="nameApply(event,${dynamicCardIndex})" type="text" class="form-control" placeholder="Name of card..." />
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Actions :</div>
                    <a class="dropdown-item addTask" id="dynamic-add-task${dynamicCardIndex}">Add new task</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item">Archive</a>
                </div>
            </div>
        </div>
        <div class="card-body" data-card-id="" id="dynamicCard${dynamicCardIndex}">
        </div>
    </div>`);
});

const nameApply = (event,index) => {
    // if the user press enter.
    if ( event.keyCode == 13 ) {
        let cardName = event.target.value;
        let data = { name : cardName , board_id : boardId };
        $.ajax({
            type: 'POST',
            url: `/cards`,
            contentType: 'application/json',
            data: JSON.stringify(data),
            success:(data) => {
                event.target.remove();
                let boardName = `#card-${data.name.replace(/\s/g,"-").toLowerCase()}`;
                $(`#card-name${index}`).html(data.name);
                $(`#dynamicCard${index}`).attr('data-card-id',data.id);
                $(`#dynamicCard${index}`).attr('id',boardName);
                $(`#dynamic-add-task${index}`).attr('refer-to',data.name);
            }
        });
    }
};

