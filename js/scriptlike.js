document.addEventListener('DOMContentLoaded', function() {
    const likeButton = document.getElementById('likeButton');
    const likeCount = document.getElementById('likeCount');
    let isLiked = false;
    let count = 0;

    likeButton.addEventListener('click', function() {
        isLiked = !isLiked;
        
        if (isLiked) {
            count++;
            likeButton.classList.add('liked');
            likeButton.querySelector('.like-text').textContent = 'Liked';
        } else {
            count--;
            likeButton.classList.remove('liked');
            likeButton.querySelector('.like-text').textContent = 'Like';
        }
        
        likeCount.textContent = count;
    });
});