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
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .calculator .display {
            grid-column: span 4;
            background-color: #e9e9e9;
            border-radius: 5px;
            padding: 10px;
            font-size: 24px;
            text-align: right;
            overflow: hidden;
            white-space: nowrap;
        }

        .calculator button {
            font-size: 18px;
            padding: 20px;
            border: none;
            border-radius: 5px;
            background-color: #e9e9e9;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .calculator button:active {
            background-color: #ccc;
        }

        .calculator button.special {
            background-color: #cce5ff;
        }

        .calculator button.special:active {
            background-color: #a0c9e1;
        }

        .calculator button.equal {
            grid-column: span 1;
            background-color: #007bff;
            color: white;
        }

        .calculator button.equal:active {
            background-color: #0056b3;
        }

        .history {
            width: 200px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            height: 560px;
            overflow-y: auto;
        }

        .history .entry {
            font-size: 16px;
            margin: 10px 0;
            padding: 5px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }

        .history .entry .expression {
            font-weight: bold;
        }

        .history .entry .result {
            color: #007bff;
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
            currentExpression = (1 / parseFloat(currentExpression)).toString();
            updateDisplay();
        }

        function square() {
            currentExpression = (parseFloat(currentExpression) ** 2).toString();
            updateDisplay();
        }

        function squareRoot() {
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
