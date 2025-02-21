<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Standard Calculator</title>
    <style>
      .calculator-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 30px;
            margin-top: 30px;
        }

        .calculator {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            background-color: #ffccdd;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        .calculator .display {
            grid-column: span 4;
            background-color: #fff0f5;
            border-radius: 8px;
            padding: 15px;
            font-size: 28px;
            text-align: right;
            overflow: hidden;
            white-space: nowrap;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .calculator button {
            font-size: 20px;
            padding: 15px;
            border: none;
            border-radius: 8px;
            background-color: #ffc1cc;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .calculator button:hover {
            background-color: #ffb3c1;
        }

        .calculator button:active {
            transform: scale(0.95);
            background-color: #ff99aa;
        }

        .calculator button.special {
            background-color: #ff99cc;
        }

        .calculator button.equal {
            background-color: #ff6699;
            color: white;
        }

        .calculator button.equal:hover {
            background-color: #ff4d88;
        }

        .history {
            background-color: #fff0f5;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 250px;
        }

        .history h3 {
            text-align: center;
            color: #ff4d88;
        }

        .history button {
            width: 100%;
            font-size: 16px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #ffb3c1;
            color: white;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .history button:hover {
            background-color: #ff99aa;
        }
    </style>
</head>
<body>
    <div class="calculator-container">
        <div class="calculator">
            <div class="display" id="display">0</div>
            <button class="special" onclick="percent()">%</button>
            <button class="special" onclick="clearEntry()">CE</button>
            <button class="special" onclick="clearAll()">C</button>
            <button class="backspace" onclick="backspace()">&larr;</button>

            <button class="special" onclick="reciprocal()">1/x</button>
            <button class="special" onclick="square()">x²</button>
            <button class="special" onclick="squareRoot()">√x</button>
            <button onclick="appendOperator('/')">÷</button>

            <button onclick="appendNumber('7')">7</button>
            <button onclick="appendNumber('8')">8</button>
            <button onclick="appendNumber('9')">9</button>
            <button onclick="appendOperator('*')">×</button>

            <button onclick="appendNumber('4')">4</button>
            <button onclick="appendNumber('5')">5</button>
            <button onclick="appendNumber('6')">6</button>
            <button onclick="appendOperator('-')">−</button>

            <button onclick="appendNumber('1')">1</button>
            <button onclick="appendNumber('2')">2</button>
            <button onclick="appendNumber('3')">3</button>
            <button onclick="appendOperator('+')">+</button>

            <button onclick="toggleSign()">+/-</button>
            <button onclick="appendNumber('0')">0</button>
            <button onclick="appendNumber('.')">.</button>
            <button class="equal" onclick="calculate()">=</button>
        </div>

        <div class="history" id="history">
    <h3>History</h3>
    <button class="special" onclick="clearHistory()">Clear History</button>
    <div class="entries" id="history-entries">
        <p>No history available.</p>
    </div>
</div>
    </div>

    <script>
        let currentExpression = '';

        function appendNumber(number) {
            if (currentExpression === '0') {
                currentExpression = number;
            } else {
                currentExpression += number;
            }
            updateDisplay();
        }

        function appendOperator(operator) {
            currentExpression += operator;
            updateDisplay();
        }

        function calculate() {
            try {
                const result = eval(currentExpression.replace('×', '*').replace('÷', '/'));
                addHistory(currentExpression, result);
                currentExpression = result.toString();
                updateDisplay();
            } catch {
                alert('Invalid Expression');
            }
        }

        function updateDisplay() {
            document.getElementById('display').textContent = currentExpression || '0';
        }

        function clearAll() {
            currentExpression = '';
            updateDisplay();
        }

        function clearEntry() {
            currentExpression = currentExpression.slice(0, -1);
            updateDisplay();
        }
        function clearHistory() {
        const historyEntries = document.getElementById('history-entries');
        historyEntries.innerHTML = '<p>No history available.</p>';
}
        function backspace() {
            currentExpression = currentExpression.slice(0, -1) || '0';
            updateDisplay();
        }

        function toggleSign() {
            currentExpression = currentExpression.startsWith('-') ? currentExpression.slice(1) : '-' + currentExpression;
            updateDisplay();
        }

        function percent() {
            currentExpression = (parseFloat(currentExpression) / 100).toString();
            updateDisplay();
        }

        function reciprocal() {
    if (!currentExpression || isNaN(currentExpression)) {
        alert("Invalid input for reciprocal");
        return;
    }
    currentExpression = (1 / parseFloat(currentExpression)).toString();
    updateDisplay();
}

function square() {
    if (!currentExpression || isNaN(currentExpression)) {
        alert("Invalid input for square");
        return;
    }
    currentExpression = (parseFloat(currentExpression) ** 2).toString();
    updateDisplay();
}

function squareRoot() {
    if (!currentExpression || isNaN(currentExpression) || parseFloat(currentExpression) < 0) {
        alert("Invalid input for square root");
        return;
    }
    currentExpression = Math.sqrt(parseFloat(currentExpression)).toString();
    updateDisplay();
}

        function addHistory(expression, result) {
            const historyEntries = document.getElementById('history-entries');
            const newEntry = document.createElement('div');
            newEntry.classList.add('entry');
            newEntry.innerHTML = `<span class="expression">${expression}</span> = <span class="result">${result}</span>`;
            historyEntries.prepend(newEntry);
        }
    </script>
</body>
</html>
