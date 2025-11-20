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
            padding: 20px;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100%;
            color: #333;
        }

        .game-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            text-align: center;
        }

        .game-title {
            font-size: 2.5rem;
            color: #4a5568;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .instruction {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 30px;
        }

        .category-badge {
            display: inline-block;
            background: #ffd700;
            color: #333;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 1rem;
        }

        .scrambled-letters {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .letter-box {
            width: 50px;
            height: 50px;
            background: #ff6b6b;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.5rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .letter-box:hover {
            background: #ff5252;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }

        .letter-box.used {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }

        .answer-area {
            margin: 30px 0;
        }

        .answer-input {
            font-size: 1.5rem;
            padding: 15px;
            border: 3px solid #4ecdc4;
            border-radius: 10px;
            width: 250px;
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
            background: #f8f9fa;
        }

        .answer-input:focus {
            outline: none;
            border-color: #26d0ce;
            box-shadow: 0 0 10px rgba(38, 208, 206, 0.3);
        }

        .game-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin: 30px 0;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .btn-primary {
            background: #4ecdc4;
            color: white;
        }

        .btn-primary:hover {
            background: #26d0ce;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background: #7f8c8d;
            transform: translateY(-2px);
        }

        .result-message {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 20px 0;
            padding: 15px;
            border-radius: 10px;
            min-height: 20px;
        }

        .correct {
            background: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
        }

        .incorrect {
            background: #f8d7da;
            color: #721c24;
            border: 2px solid #f5c6cb;
        }

        .score-board {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
        }

        .score-item {
            text-align: center;
        }

        .score-number {
            font-size: 1.5rem;
            font-weight: bold;
            color: #4a5568;
        }

        .score-label {
            font-size: 0.9rem;
            color: #666;
        }

        .hint-section {
            margin: 20px 0;
            padding: 15px;
            background: #fff3cd;
            border-radius: 10px;
            border: 2px solid #ffeaa7;
        }

        .hint-text {
            color: #856404;
            font-weight: bold;
        }

        @media (max-width: 480px) {
            .game-container {
                padding: 20px;
                margin: 10px;
            }
            
            .game-title {
                font-size: 2rem;
            }
            
            .answer-input {
                width: 200px;
                font-size: 1.2rem;
            }
            
            .letter-box {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
        }
    </style>
  <style>@view-transition { navigation: auto; }</style>
  <script src="/_sdk/data_sdk.js" type="text/javascript"></script>
  <script src="https://cdn.tailwindcss.com" type="text/javascript"></script>
 </head>
 <body>
  <main class="game-container">
   <h1 class="game-title" id="gameTitle">Game Menyusun Kata</h1>
   <p class="instruction" id="instructionText">Susun huruf-huruf berikut menjadi kata yang benar!</p>
   <div class="score-board">
    <div class="score-item">
     <div class="score-number" id="correctCount">
      0
     </div>
     <div class="score-label">
      Benar
     </div>
    </div>
    <div class="score-item">
     <div class="score-number" id="totalCount">
      0
     </div>
     <div class="score-label">
      Total
     </div>
    </div>
    <div class="score-item">
     <div class="score-number" id="streakCount">
      0
     </div>
     <div class="score-label">
      Beruntun
     </div>
    </div>
   </div>
   <div class="category-badge" id="categoryBadge">
    Kategori: Hewan
   </div>
   <div class="scrambled-letters" id="scrambledLetters"></div>
   <div class="hint-section">
    <div class="hint-text" id="hintText">
     Petunjuk akan muncul di sini
    </div>
   </div>
   <div class="answer-area"><input type="text" class="answer-input" id="answerInput" placeholder="JAWABAN ANDA" maxlength="15">
   </div>
   <div class="result-message" id="resultMessage"></div>
   <div class="game-buttons"><button class="btn btn-primary" id="checkButton">Cek Jawaban</button> <button class="btn btn-secondary" id="newGameButton">Game Baru</button> <button class="btn btn-secondary" id="clearButton">Hapus</button>
   </div>
  </main>
  <script>
        // Konfigurasi default
        const defaultConfig = {
            game_title: "Game Menyusun Kata",
            instruction_text: "Susun huruf-huruf berikut menjadi kata yang benar!",
            new_game_button: "Game Baru",
            check_button: "Cek Jawaban"
        };

        // Data kata-kata berdasarkan kategori
        const gameData = {
            hewan: [
                { word: "KUCING", hint: "Hewan peliharaan yang suka mengeong" },
                { word: "ANJING", hint: "Sahabat setia manusia" },
                { word: "GAJAH", hint: "Hewan terbesar di darat" },
                { word: "HARIMAU", hint: "Raja hutan berloreng" },
                { word: "SINGA", hint: "Raja hutan Afrika" },
                { word: "KUDA", hint: "Hewan yang bisa ditunggangi" },
                { word: "KAMBING", hint: "Hewan yang suka memakan rumput" },
                { word: "AYAM", hint: "Unggas yang berkokok di pagi hari" },
                { word: "BEBEK", hint: "Unggas yang suka berenang" },
                { word: "IKAN", hint: "Hewan yang hidup di air" }
            ],
            buah: [
                { word: "APEL", hint: "Buah merah yang renyah" },
                { word: "JERUK", hint: "Buah kaya vitamin C" },
                { word: "PISANG", hint: "Buah kuning yang manis" },
                { word: "MANGGA", hint: "Buah tropis yang manis" },
                { word: "ANGGUR", hint: "Buah kecil yang bergerombol" },
                { word: "SEMANGKA", hint: "Buah besar berair merah" },
                { word: "MELON", hint: "Buah hijau yang segar" },
                { word: "DURIAN", hint: "Raja buah yang berbau khas" },
                { word: "RAMBUTAN", hint: "Buah berbulu merah" },
                { word: "NANAS", hint: "Buah berduri kuning" }
            ],
            kota: [
                { word: "JAKARTA", hint: "Ibu kota Indonesia" },
                { word: "BANDUNG", hint: "Kota kembang di Jawa Barat" },
                { word: "SURABAYA", hint: "Kota pahlawan di Jawa Timur" },
                { word: "MEDAN", hint: "Kota terbesar di Sumatera" },
                { word: "YOGYA", hint: "Kota gudeg dan keraton" },
                { word: "SEMARANG", hint: "Kota atlas di Jawa Tengah" },
                { word: "MALANG", hint: "Kota apel di Jawa Timur" },
                { word: "SOLO", hint: "Kota batik di Jawa Tengah" },
                { word: "BALI", hint: "Pulau dewata" },
                { word: "BOGOR", hint: "Kota hujan dekat Jakarta" }
            ]
        };

        // Variabel game
        let currentWord = "";
        let currentCategory = "";
        let currentHint = "";
        let scrambledWord = "";
        let correctAnswers = 0;
        let totalQuestions = 0;
        let currentStreak = 0;

        // Fungsi untuk mengacak huruf
        function scrambleWord(word) {
            const letters = word.split('');
            for (let i = letters.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [letters[i], letters[j]] = [letters[j], letters[i]];
            }
            return letters.join('');
        }

        // Fungsi untuk memulai game baru
        function startNewGame() {
            const categories = Object.keys(gameData);
            currentCategory = categories[Math.floor(Math.random() * categories.length)];
            
            const categoryWords = gameData[currentCategory];
            const randomWord = categoryWords[Math.floor(Math.random() * categoryWords.length)];
            
            currentWord = randomWord.word;
            currentHint = randomWord.hint;
            
            // Pastikan kata teracak berbeda dari aslinya
            do {
                scrambledWord = scrambleWord(currentWord);
            } while (scrambledWord === currentWord && currentWord.length > 1);
            
            displayScrambledLetters();
            updateCategoryDisplay();
            updateHint();
            clearResult();
            clearAnswer();
        }

        // Fungsi untuk menampilkan huruf teracak
        function displayScrambledLetters() {
            const container = document.getElementById('scrambledLetters');
            container.innerHTML = '';
            
            for (let letter of scrambledWord) {
                const letterBox = document.createElement('button');
                letterBox.className = 'letter-box';
                letterBox.textContent = letter;
                letterBox.onclick = () => addLetterToAnswer(letter, letterBox);
                container.appendChild(letterBox);
            }
        }

        // Fungsi untuk menambah huruf ke jawaban
        function addLetterToAnswer(letter, letterBox) {
            if (letterBox.classList.contains('used')) return;
            
            const answerInput = document.getElementById('answerInput');
            if (answerInput.value.length < currentWord.length) {
                answerInput.value += letter;
                letterBox.classList.add('used');
            }
        }

        // Fungsi untuk mengupdate tampilan kategori
        function updateCategoryDisplay() {
            const categoryNames = {
                hewan: 'Hewan',
                buah: 'Buah',
                kota: 'Kota'
            };
            document.getElementById('categoryBadge').textContent = `Kategori: ${categoryNames[currentCategory]}`;
        }

        // Fungsi untuk mengupdate petunjuk
        function updateHint() {
            document.getElementById('hintText').textContent = currentHint;
        }

        // Fungsi untuk mengecek jawaban
        function checkAnswer() {
            const userAnswer = document.getElementById('answerInput').value.toUpperCase();
            const resultDiv = document.getElementById('resultMessage');
            
            totalQuestions++;
            
            if (userAnswer === currentWord) {
                correctAnswers++;
                currentStreak++;
                resultDiv.textContent = `🎉 Benar! Jawabannya adalah "${currentWord}"`;
                resultDiv.className = 'result-message correct';
                
                // Auto start new game after 2 seconds
                setTimeout(() => {
                    startNewGame();
                }, 2000);
            } else {
                currentStreak = 0;
                resultDiv.textContent = `❌ Salah! Jawaban yang benar adalah "${currentWord}"`;
                resultDiv.className = 'result-message incorrect';
                
                // Show correct answer for 3 seconds then start new game
                setTimeout(() => {
                    startNewGame();
                }, 3000);
            }
            
            updateScoreBoard();
        }

        // Fungsi untuk mengupdate papan skor
        function updateScoreBoard() {
            document.getElementById('correctCount').textContent = correctAnswers;
            document.getElementById('totalCount').textContent = totalQuestions;
            document.getElementById('streakCount').textContent = currentStreak;
        }

        // Fungsi untuk membersihkan hasil
        function clearResult() {
            const resultDiv = document.getElementById('resultMessage');
            resultDiv.textContent = '';
            resultDiv.className = 'result-message';
        }

        // Fungsi untuk membersihkan jawaban
        function clearAnswer() {
            document.getElementById('answerInput').value = '';
            const letterBoxes = document.querySelectorAll('.letter-box');
            letterBoxes.forEach(box => box.classList.remove('used'));
        }

        // Event listeners
        document.getElementById('checkButton').addEventListener('click', checkAnswer);
        document.getElementById('newGameButton').addEventListener('click', startNewGame);
        document.getElementById('clearButton').addEventListener('click', clearAnswer);

        // Enter key untuk cek jawaban
        document.getElementById('answerInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                checkAnswer();
            }
        });

        // Prevent form submission
        document.getElementById('answerInput').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
            }
        });

        // Fungsi untuk mengupdate UI berdasarkan config
        async function onConfigChange(config) {
            document.getElementById('gameTitle').textContent = config.game_title || defaultConfig.game_title;
            document.getElementById('instructionText').textContent = config.instruction_text || defaultConfig.instruction_text;
            document.getElementById('newGameButton').textContent = config.new_game_button || defaultConfig.new_game_button;
            document.getElementById('checkButton').textContent = config.check_button || defaultConfig.check_button;
        }

        // Inisialisasi Element SDK
        if (window.elementSdk) {
            window.elementSdk.init({
                defaultConfig: defaultConfig,
                onConfigChange: onConfigChange,
                mapToCapabilities: (config) => ({
                    recolorables: [],
                    borderables: [],
                    fontEditable: undefined,
                    fontSizeable: undefined
                }),
                mapToEditPanelValues: (config) => new Map([
                    ["game_title", config.game_title || defaultConfig.game_title],
                    ["instruction_text", config.instruction_text || defaultConfig.instruction_text],
                    ["new_game_button", config.new_game_button || defaultConfig.new_game_button],
                    ["check_button", config.check_button || defaultConfig.check_button]
                ])
            });
        }

        // Mulai game pertama kali
        startNewGame();
    </script>
 <script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'99fcca49544abd94',t:'MTc2MzM1Njk0NS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>