// Function to update the comments section with new comments
function updateComments() {
    const commentsContainer = document.getElementById('comments-container');
    commentsContainer.innerHTML = '';
  
    comments.forEach(comment => {
      const commentElement = document.createElement('div');
      commentElement.classList.add('comment');
  
      const authorElement = document.createElement('div');
      authorElement.classList.add('author');
      authorElement.innerText = comment.author;
  
      const timestampElement = document.createElement('div');
      timestampElement.classList.add('timestamp');
      timestampElement.innerText = comment.timestamp;
  
      const contentElement = document.createElement('div');
      contentElement.classList.add('content');
      contentElement.innerText = comment.content;
  
      commentElement.appendChild(authorElement);
      commentElement.appendChild(timestampElement);
      commentElement.appendChild(contentElement);
  
      commentsContainer.appendChild(commentElement);
    });
  }
  
  // Function to get the current timestamp in a desired format
  function getCurrentTimestamp() {
    const now = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' };
    return now.toLocaleDateString('en-US', options);
  }
  
  // Sample comments data
  let comments = [
    {
      author: 'Tensae',
      timestamp: 'December 1, 2020 at 4:50 PM',
      content: 'This is a great Blog page!'
    },
    {
      author: 'Yabsera',
      timestamp: 'June 11, 2022 at 3:30 AM',
      content: 'Thanks for sharing with us!'
    }
  ];
  
  // Update comments section with initial comments
  updateComments();
  
  // Handle form submission to add new comment
  const commentForm = document.getElementById('comment-form');
  commentForm.addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission
  
    // Get user input values
    const nameInput = document.getElementById('name');
    const commentInput = document.getElementById('comment');
    const name = nameInput.value;
    const comment = commentInput.value;
  
    // Create new comment object with the current timestamp
    const newComment = {
      author: name,
      timestamp: getCurrentTimestamp(),
      content: comment
    };
  
    // Add new comment to the comments array
    comments.push(newComment);
  
    // Update comments section with the new comment
    updateComments();
  
    // Clear input fields
    nameInput.value = '';
    commentInput.value = '';
  });
  