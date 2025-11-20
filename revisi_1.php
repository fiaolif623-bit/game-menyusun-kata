<!doctype html>
<html lang="id">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Game Menyusun Kata</title>
  <script src="/_sdk/element_sdk.js"></script>
  <style>
    body {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Comic Sans MS', 'Arial', sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100%;
      height: 100%;
    }

    html {
      height: 100%;
    }

    .game-container {
      background: white;
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      max-width: 600px;
      width: 90%;
      text-align: center;
    }

    h1 {
      color: #667eea;
      margin: 0 0 10px 0;
      font-size: 2.5em;
    }

    .instruction {
      color: #666;
      margin-bottom: 30px;
      font-size: 1.1em;
    }

    .level-info {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      gap: 10px;
      flex-wrap: wrap;
    }

    .level-badge {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      padding: 10px 20px;
      border-radius: 20px;
      font-weight: bold;
      font-size: 1.1em;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .progress-text {
      background: #f0f0f0;
      color: #666;
      padding: 10px 20px;
      border-radius: 20px;
      font-weight: bold;
      font-size: 1em;
    }

    .category-badge {
      display: inline-block;
      background: #ffd93d;
      color: #333;
      padding: 8px 20px;
      border-radius: 20px;
      font-weight: bold;
      margin-bottom: 20px;
      font-size: 1.1em;
    }

    .scrambled-word {
      font-size: 2em;
      color: #764ba2;
      font-weight: bold;
      margin: 20px 0;
      letter-spacing: 8px;
      padding: 20px;
      background: #f0f0f0;
      border-radius: 10px;
    }

    .input-container {
      margin: 30px 0;
    }

    input[type="text"] {
      font-size: 1.5em;
      padding: 15px;
      border: 3px solid #667eea;
      border-radius: 10px;
      width: 80%;
      text-align: center;
      font-family: 'Arial', sans-serif;
      transition: all 0.3s;
    }

    input[type="text"]:focus {
      outline: none;
      border-color: #764ba2;
      box-shadow: 0 0 10px rgba(102, 126, 234, 0.3);
    }

    .button-group {
      display: flex;
      gap: 10px;
      justify-content: center;
      flex-wrap: wrap;
      margin: 20px 0;
    }

    button {
      background: #667eea;
      color: white;
      border: none;
      padding: 15px 30px;
      font-size: 1.1em;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s;
      font-weight: bold;
    }

    button:hover {
      background: #764ba2;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    button:active {
      transform: translateY(0);
    }

    .hint-button {
      background: #ffd93d;
      color: #333;
    }

    .hint-button:hover {
      background: #ffc107;
    }

    .next-button {
      background: #4caf50;
    }

    .next-button:hover {
      background: #45a049;
    }

    .message {
      margin-top: 20px;
      padding: 15px;
      border-radius: 10px;
      font-size: 1.2em;
      font-weight: bold;
      min-height: 24px;
    }

    .message.correct {
      background: #d4edda;
      color: #155724;
    }

    .message.incorrect {
      background: #f8d7da;
      color: #721c24;
    }

    .message.hint {
      background: #fff3cd;
      color: #856404;
    }

    .score-board {
      display: flex;
      justify-content: space-around;
      margin-top: 30px;
      padding: 20px;
      background: #f8f9fa;
      border-radius: 10px;
    }

    .score-item {
      text-align: center;
    }

    .score-label {
      color: #666;
      font-size: 0.9em;
      margin-bottom: 5px;
    }

    .score-value {
      font-size: 2em;
      font-weight: bold;
      color: #667eea;
    }

    .emoji {
      font-size: 3em;
      margin: 20px 0;
    }

    .level-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 20px;
      margin: 30px 0;
    }

    .level-card {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      padding: 30px 20px;
      border-radius: 15px;
      cursor: pointer;
      transition: all 0.3s;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .level-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    .level-icon {
      font-size: 3em;
      margin-bottom: 10px;
    }

    .level-name {
      font-size: 1.3em;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .level-difficulty {
      font-size: 1.1em;
      margin-bottom: 10px;
      opacity: 0.9;
    }

    .level-questions {
      font-size: 0.9em;
      opacity: 0.8;
    }

    .game-header {
      display: flex;
      align-items: center;
      gap: 15px;
      margin-bottom: 20px;
    }

    .back-button {
      background: #6c757d;
      padding: 10px 20px;
      font-size: 1em;
    }

    .back-button:hover {
      background: #5a6268;
    }

    #game-title-small {
      color: #667eea;
      margin: 0;
      font-size: 1.5em;
      flex-grow: 1;
    }
  </style>
  <style>@view-transition { navigation: auto; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
 </head>
 <body>
  <div class="game-container"><!-- Level Selection Screen -->
   <div id="level-selection-screen">
    <h1 id="game-title">🎮 Game Menyusun Kata</h1>
    <p class="instruction" id="instruction-text">Pilih level untuk memulai permainan!</p>
    <div class="level-grid">
     <div class="level-card" onclick="startLevel(1)">
      <div class="level-icon">
       😊
      </div>
      <div class="level-name">
       Level 1
      </div>
      <div class="level-difficulty">
       Mudah
      </div>
      <div class="level-questions">
       5 Pertanyaan
      </div>
     </div>
     <div class="level-card" onclick="startLevel(2)">
      <div class="level-icon">
       🙂
      </div>
      <div class="level-name">
       Level 2
      </div>
      <div class="level-difficulty">
       Sedang
      </div>
      <div class="level-questions">
       5 Pertanyaan
      </div>
     </div>
     <div class="level-card" onclick="startLevel(3)">
      <div class="level-icon">
       😎
      </div>
      <div class="level-name">
       Level 3
      </div>
      <div class="level-difficulty">
       Sulit
      </div>
      <div class="level-questions">
       5 Pertanyaan
      </div>
     </div>
     <div class="level-card" onclick="startLevel(4)">
      <div class="level-icon">
       🔥
      </div>
      <div class="level-name">
       Level 4
      </div>
      <div class="level-difficulty">
       Sangat Sulit
      </div>
      <div class="level-questions">
       3 Pertanyaan
      </div>
     </div>
    </div>
   </div><!-- Game Screen -->
   <div id="game-screen" style="display: none;">
    <div class="game-header"><button class="back-button" onclick="backToLevelSelection()">← Kembali</button>
     <h2 id="game-title-small">🎮 Game Menyusun Kata</h2>
    </div>
    <div class="level-info">
     <div class="level-badge" id="level-badge">
      Level 1: Mudah
     </div>
     <div class="progress-text" id="progress-text">
      Pertanyaan 1 dari 5
     </div>
    </div>
    <div class="category-badge" id="category">
     Kategori: Hewan
    </div>
    <div class="emoji" id="emoji">
     🦁
    </div>
    <div class="scrambled-word" id="scrambled-word">
     GNASI
    </div>
    <div class="input-container"><input type="text" id="answer-input" placeholder="Ketik jawabanmu di sini..." autocomplete="off">
    </div>
    <div class="button-group"><button onclick="checkAnswer()" id="check-button">✓ Cek Jawaban</button> <button class="hint-button" onclick="showHint()" id="hint-button">💡 Petunjuk</button> <button class="next-button" onclick="nextWord()" id="next-button">→ Kata Berikutnya</button>
    </div>
    <div class="message" id="message"></div>
    <div class="score-board">
     <div class="score-item">
      <div class="score-label">
       Benar
      </div>
      <div class="score-value" id="correct-score">
       0
      </div>
     </div>
     <div class="score-item">
      <div class="score-label">
       Salah
      </div>
      <div class="score-value" id="incorrect-score">
       0
      </div>
     </div>
     <div class="score-item">
      <div class="score-label">
       Skor
      </div>
      <div class="score-value" id="total-score">
       0
      </div>
     </div>
    </div>
   </div>
  </div>
  <script>
    const defaultConfig = {
      game_title: "🎮 Game Menyusun Kata",
      instruction_text: "Susun huruf-huruf acak menjadi kata yang benar!",
      check_button_text: "✓ Cek Jawaban",
      hint_button_text: "💡 Petunjuk",
      next_button_text: "→ Kata Berikutnya",
      primary_color: "#667eea",
      secondary_color: "#764ba2",
      accent_color: "#ffd93d",
      success_color: "#4caf50",
      text_color: "#333333",
      font_family: "Comic Sans MS",
      font_size: 16
    };

    const levels = {
      1: {
        name: "Mudah",
        questions: [
          { word: "IKAN", category: "hewan", emoji: "🐟", hint: "Hidup di air" },
          { word: "APEL", category: "buah", emoji: "🍎", hint: "Buah berwarna merah" },
          { word: "BALI", category: "kota", emoji: "🏝️", hint: "Pulau wisata" },
          { word: "KUDA", category: "hewan", emoji: "🐴", hint: "Hewan berkaki empat" },
          { word: "NANAS", category: "buah", emoji: "🍍", hint: "Buah berduri" }
        ]
      },
      2: {
        name: "Sedang",
        questions: [
          { word: "KUCING", category: "hewan", emoji: "🐱", hint: "Hewan peliharaan yang suka ikan" },
          { word: "JERUK", category: "buah", emoji: "🍊", hint: "Buah kaya vitamin C" },
          { word: "MEDAN", category: "kota", emoji: "🌃", hint: "Kota di Sumatera Utara" },
          { word: "BURUNG", category: "hewan", emoji: "🐦", hint: "Hewan yang bisa terbang" },
          { word: "PISANG", category: "buah", emoji: "🍌", hint: "Buah favorit monyet" }
        ]
      },
      3: {
        name: "Sulit",
        questions: [
          { word: "KELINCI", category: "hewan", emoji: "🐰", hint: "Hewan dengan telinga panjang" },
          { word: "SEMANGKA", category: "buah", emoji: "🍉", hint: "Buah besar berair" },
          { word: "BANDUNG", category: "kota", emoji: "🌆", hint: "Kota kembang" },
          { word: "DURIAN", category: "buah", emoji: "🌰", hint: "Raja buah yang berbau" },
          { word: "SURABAYA", category: "kota", emoji: "🏢", hint: "Kota pahlawan" }
        ]
      },
      4: {
        name: "Sangat Sulit",
        questions: [
          { word: "YOGYAKARTA", category: "kota", emoji: "🕌", hint: "Kota pelajar dan budaya" },
          { word: "SEMARANG", category: "kota", emoji: "🌇", hint: "Kota Lumpia" },
          { word: "JAKARTA", category: "kota", emoji: "🏙️", hint: "Ibu kota Indonesia" }
        ]
      }
    };

    let currentLevel = 1;
    let currentQuestionIndex = 0;
    let currentWord = "";
    let currentCategory = "";
    let currentEmoji = "";
    let currentHint = "";
    let correctCount = 0;
    let incorrectCount = 0;
    let totalScore = 0;
    let hintUsed = false;

    function scrambleWord(word) {
      const arr = word.split('');
      for (let i = arr.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [arr[i], arr[j]] = [arr[j], arr[i]];
      }
      return arr.join('');
    }

    function updateLevelDisplay() {
      const levelData = levels[currentLevel];
      const totalQuestions = levelData.questions.length;
      
      document.getElementById('level-badge').textContent = `Level ${currentLevel}: ${levelData.name}`;
      document.getElementById('progress-text').textContent = `Pertanyaan ${currentQuestionIndex + 1} dari ${totalQuestions}`;
    }

    function startLevel(level) {
      currentLevel = level;
      currentQuestionIndex = 0;
      correctCount = 0;
      incorrectCount = 0;
      totalScore = 0;
      updateScores();
      
      document.getElementById('level-selection-screen').style.display = 'none';
      document.getElementById('game-screen').style.display = 'block';
      
      loadNewWord();
    }

    function backToLevelSelection() {
      document.getElementById('level-selection-screen').style.display = 'block';
      document.getElementById('game-screen').style.display = 'none';
      
      currentLevel = 1;
      currentQuestionIndex = 0;
      correctCount = 0;
      incorrectCount = 0;
      totalScore = 0;
      updateScores();
    }

    function loadNewWord() {
      const levelData = levels[currentLevel];
      
      if (currentQuestionIndex >= levelData.questions.length) {
        const messageEl = document.getElementById('message');
        messageEl.textContent = `🏆 Level ${currentLevel} Selesai! Skor: ${totalScore}. Klik "Kembali" untuk pilih level lain.`;
        messageEl.className = 'message correct';
        document.getElementById('next-button').style.display = 'none';
        document.getElementById('check-button').style.display = 'none';
        document.getElementById('hint-button').style.display = 'none';
        return;
      }
      
      const question = levelData.questions[currentQuestionIndex];
      currentWord = question.word;
      currentCategory = question.category;
      currentEmoji = question.emoji;
      currentHint = question.hint;
      hintUsed = false;
      
      let scrambled = scrambleWord(currentWord);
      while (scrambled === currentWord && currentWord.length > 3) {
        scrambled = scrambleWord(currentWord);
      }
      
      document.getElementById('scrambled-word').textContent = scrambled;
      document.getElementById('category').textContent = `Kategori: ${currentCategory.charAt(0).toUpperCase() + currentCategory.slice(1)}`;
      document.getElementById('emoji').textContent = currentEmoji;
      document.getElementById('answer-input').value = '';
      document.getElementById('message').textContent = '';
      document.getElementById('message').className = 'message';
      document.getElementById('next-button').style.display = 'inline-block';
      document.getElementById('check-button').style.display = 'inline-block';
      document.getElementById('hint-button').style.display = 'inline-block';
      
      updateLevelDisplay();
    }

    function checkAnswer() {
      const userAnswer = document.getElementById('answer-input').value.toUpperCase().trim();
      const messageEl = document.getElementById('message');
      
      if (!userAnswer) {
        messageEl.textContent = 'Silakan masukkan jawaban terlebih dahulu!';
        messageEl.className = 'message';
        return;
      }
      
      if (userAnswer === currentWord) {
        const points = hintUsed ? 5 : 10;
        correctCount++;
        totalScore += points;
        messageEl.textContent = `🎉 Benar! Jawabannya: ${currentWord}. +${points} poin`;
        messageEl.className = 'message correct';
        updateScores();
        currentQuestionIndex++;
        setTimeout(nextWord, 2000);
      } else {
        incorrectCount++;
        messageEl.textContent = '❌ Salah! Coba lagi!';
        messageEl.className = 'message incorrect';
        updateScores();
      }
    }

    function showHint() {
      const messageEl = document.getElementById('message');
      messageEl.textContent = `💡 Petunjuk: ${currentHint}`;
      messageEl.className = 'message hint';
      hintUsed = true;
    }

    function nextWord() {
      currentQuestionIndex++;
      loadNewWord();
    }

    function updateScores() {
      document.getElementById('correct-score').textContent = correctCount;
      document.getElementById('incorrect-score').textContent = incorrectCount;
      document.getElementById('total-score').textContent = totalScore;
    }

    document.getElementById('answer-input').addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        checkAnswer();
      }
    });

    async function onConfigChange(config) {
      const baseFontStack = 'Arial, sans-serif';
      const customFont = config.font_family || defaultConfig.font_family;
      const baseSize = config.font_size || defaultConfig.font_size;
      
      document.getElementById('game-title').textContent = config.game_title || defaultConfig.game_title;
      document.getElementById('instruction-text').textContent = config.instruction_text || defaultConfig.instruction_text;
      document.getElementById('check-button').textContent = config.check_button_text || defaultConfig.check_button_text;
      document.getElementById('hint-button').textContent = config.hint_button_text || defaultConfig.hint_button_text;
      document.getElementById('next-button').textContent = config.next_button_text || defaultConfig.next_button_text;
      
      document.body.style.background = `linear-gradient(135deg, ${config.primary_color || defaultConfig.primary_color} 0%, ${config.secondary_color || defaultConfig.secondary_color} 100%)`;
      
      const h1 = document.querySelector('h1');
      h1.style.color = config.primary_color || defaultConfig.primary_color;
      h1.style.fontFamily = `${customFont}, ${baseFontStack}`;
      h1.style.fontSize = `${baseSize * 2.5}px`;
      
      const instruction = document.querySelector('.instruction');
      instruction.style.fontFamily = `${customFont}, ${baseFontStack}`;
      instruction.style.fontSize = `${baseSize * 1.1}px`;
      instruction.style.color = config.text_color || defaultConfig.text_color;
      
      document.querySelector('.category-badge').style.background = config.accent_color || defaultConfig.accent_color;
      document.querySelector('.scrambled-word').style.color = config.secondary_color || defaultConfig.secondary_color;
      
      const buttons = document.querySelectorAll('button:not(.hint-button):not(.next-button)');
      buttons.forEach(btn => {
        btn.style.background = config.primary_color || defaultConfig.primary_color;
        btn.style.fontFamily = `${customFont}, ${baseFontStack}`;
        btn.style.fontSize = `${baseSize * 1.1}px`;
      });
      
      const hintButton = document.querySelector('.hint-button');
      hintButton.style.background = config.accent_color || defaultConfig.accent_color;
      hintButton.style.fontFamily = `${customFont}, ${baseFontStack}`;
      hintButton.style.fontSize = `${baseSize * 1.1}px`;
      
      const nextButton = document.querySelector('.next-button');
      nextButton.style.background = config.success_color || defaultConfig.success_color;
      nextButton.style.fontFamily = `${customFont}, ${baseFontStack}`;
      nextButton.style.fontSize = `${baseSize * 1.1}px`;
      
      const input = document.querySelector('input[type="text"]');
      input.style.borderColor = config.primary_color || defaultConfig.primary_color;
      input.style.fontFamily = `${customFont}, ${baseFontStack}`;
      input.style.fontSize = `${baseSize * 1.5}px`;
      
      const scoreValues = document.querySelectorAll('.score-value');
      scoreValues.forEach(val => {
        val.style.color = config.primary_color || defaultConfig.primary_color;
        val.style.fontFamily = `${customFont}, ${baseFontStack}`;
      });
    }

    if (window.elementSdk) {
      window.elementSdk.init({
        defaultConfig,
        onConfigChange,
        mapToCapabilities: (config) => ({
          recolorables: [
            {
              get: () => config.primary_color || defaultConfig.primary_color,
              set: (value) => {
                config.primary_color = value;
                window.elementSdk.setConfig({ primary_color: value });
              }
            },
            {
              get: () => config.secondary_color || defaultConfig.secondary_color,
              set: (value) => {
                config.secondary_color = value;
                window.elementSdk.setConfig({ secondary_color: value });
              }
            },
            {
              get: () => config.accent_color || defaultConfig.accent_color,
              set: (value) => {
                config.accent_color = value;
                window.elementSdk.setConfig({ accent_color: value });
              }
            },
            {
              get: () => config.success_color || defaultConfig.success_color,
              set: (value) => {
                config.success_color = value;
                window.elementSdk.setConfig({ success_color: value });
              }
            },
            {
              get: () => config.text_color || defaultConfig.text_color,
              set: (value) => {
                config.text_color = value;
                window.elementSdk.setConfig({ text_color: value });
              }
            }
          ],
          borderables: [],
          fontEditable: {
            get: () => config.font_family || defaultConfig.font_family,
            set: (value) => {
              config.font_family = value;
              window.elementSdk.setConfig({ font_family: value });
            }
          },
          fontSizeable: {
            get: () => config.font_size || defaultConfig.font_size,
            set: (value) => {
              config.font_size = value;
              window.elementSdk.setConfig({ font_size: value });
            }
          }
        }),
        mapToEditPanelValues: (config) => new Map([
          ["game_title", config.game_title || defaultConfig.game_title],
          ["instruction_text", config.instruction_text || defaultConfig.instruction_text],
          ["check_button_text", config.check_button_text || defaultConfig.check_button_text],
          ["hint_button_text", config.hint_button_text || defaultConfig.hint_button_text],
          ["next_button_text", config.next_button_text || defaultConfig.next_button_text]
        ])
      });
    }
  </script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'99fe1253b0d20fe2',t:'MTc2MzM3MDM4MS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>