
const articles = document.getElementById('articles');

if (articles) {
  articles.addEventListener('click', e => {
    if (e.target.className === 'btn btn-danger delete-article') {
        
        const id = e.target.getAttribute('data-id');

        fetch(`/public/index.php/article/delete/${id}`, {
          method: 'DELETE'
        }).then(res => window.location.reload());
        
    }
  });
}

const chapters = document.getElementById('chapters');

if (chapters) {
  chapters.addEventListener('click', e => {
    if (e.target.className === 'suppress-post') {
           
        const id = e.target.getAttribute('suppress-id');

        fetch(`/public/index.php/office/delete/${id}`, {
          method: 'DELETE'
        }).then(res => window.location.reload()); 
        
    }
  });
}

const commentaires = document.getElementById('commentaires');

if (commentaires) {
  commentaires.addEventListener('click', e => {
    
      if (e.target.className === 'trash-comment') {
        
        
        const id = e.target.getAttribute('trash-id');

        fetch(`/public/index.php/backcom/delete/${id}`, {
          method: 'DELETE'
        }).then(res => window.location.assign("http://localhost/symfovue16/public/index.php/backcom"));
        
        
    }
     
  });
}
