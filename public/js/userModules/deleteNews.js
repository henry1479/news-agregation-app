document.addEventListener("DOMContentLoaded", deleteNews);

// асинхронно удаляет новость по клику на кнопку
// после перезагружает текущую страницу
function deleteNews() {
    const el = document.querySelectorAll(".delete");
    el.forEach((value, key)=>{
        value.addEventListener('click', function(event){
            event.preventDefault();
            const id = this.getAttribute("rel");
            if(confirm("Do you want delete this news?")) {
                send('/news/delete/' + id)
                .then(result => location.reload());
            }
        });
    });
}

// отправляет данные на серверную часть
// которая возвращает ответ в json формате
async function send(url) {
    let response = await fetch(url, {
        method: "DELETE",
        headers:{
            "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").getAttribute('content') 
        }
    });

    let result = await response.json();
    return result;
}
