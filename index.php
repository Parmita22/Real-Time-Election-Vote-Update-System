<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Professional News Layout</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <!-- Header Section -->
    <div class="header-section">
      <div>
        <!-- <h1>News Layout</h1> -->
      </div>
      <img src="extra.png" alt="Logo">
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
      <div class="news-image"></div>
      <div class="news-image"></div>
    </div>

    <!-- Right Section with Candidate Info (3 cards) -->
    <div class="right-section">
      <div class="candidate-box" id="box1">
        <div class="candidate-content">
          <div class="name">राम सातपुते <span>=</span></div>
        </div>
        <h2 id="votes1">1340</h2>
        <img src="ramsatpute.png" alt="Ram Satpute">
      </div>
      <div class="candidate-box" id="box2">
        <div class="candidate-content">
          <div class="name">प्रणिती शिंदे <span>=</span></div>
        </div>
        <h2 id="votes2">1400</h2>
        <img src="praniti.png" alt="Praniti Shinde">
      </div>
      <div class="candidate-box" id="box3">
        <div class="candidate-content">
          <div class="name">आतिश बनसोडे <span>=</span></div>
        </div>
        <h2 id="votes3">1200</h2>
        <img src="3.png" style="width: 120px; height: 100px" alt="Atish Bansode">
      </div>
    </div>

    <!-- Bottom Section with Candidate Cards (3 more cards) -->
    <div class="bottom-section">
      <img class="madha-image" style="width: 140px" src="second.png" alt="Madha Loksabha">

      <!-- Candidate 1 -->
      <div class="candidate-box">
        <div class="candidate-content">
          <div class="name">राजसिंह निवाळकर</div>
        </div>
        <span>=</span>
        <div class="votes" id="votes4">1340</div>
        <img class="box" style="width: 150px" src="1.png" alt="Candidate 1">
      </div>

      <!-- Candidate 2 -->
      <div class="candidate-box">
        <div class="candidate-content">
          <div class="name">धैर्यशील मोहिते पाटील</div>
        </div>
        <span>=</span>
        <div class="votes" id="votes5">1400</div>
        <img class="box" style="width: 200px" src="6.png" alt="Candidate 2">
      </div>

      <!-- Candidate 3 -->
      <div class="candidate-box">
        <div class="candidate-content">
          <div class="name">रमेश वारस्कर</div>
        </div>
        <span>=</span>
        <div class="votes" id="votes6">1200</div>
        <img class="box" style="width: 100px" src="8.png" alt="Candidate 3">
      </div>
    </div>
  </div>

  <script>
    function updateVotes() {
      fetch('fetch_votes.php')
        .then(response => response.json())
        .then(data => {
          // Update the vote counts for each candidate
          data.forEach(candidate => {
            const {
              name,
              votes
            } = candidate;

            // Find the vote element for the candidate
            document.querySelectorAll('.candidate-box').forEach(box => {
              const nameElement = box.querySelector('.name');
              const votesElement = box.querySelector('.votes, h2');

              if (nameElement && nameElement.textContent.includes(name)) {
                // Add updating class
                votesElement.classList.add(votesElement.tagName === 'H2' ? 'h2-updating' : 'votes-updating');

                // Set a timeout to remove the class and update the text
                setTimeout(() => {
                  votesElement.textContent = votes;
                  votesElement.classList.remove(votesElement.tagName === 'H2' ? 'h2-updating' : 'votes-updating');
                }, 500); // Match this with the transition duration in CSS
              }
            });
          });
        })
        .catch(error => console.error('Error fetching votes:', error));
    }

    // Update votes every 5 seconds
    setInterval(updateVotes, 5000);

    // Initial call to populate votes on page load
    updateVotes();
  </script>
</body>

</html>