<style>
        .calendar-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .calendar-header h5 {
            margin: 0;
        }

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
            text-align: center;
        }

        .calendar div {
            padding: 10px;
            border-radius: 50%;
        }

        .calendar .day {
            color: #6c757d;
        }

        .calendar .date {
            color: #28a745;
            font-weight: bold;
        }

        .calendar .grey-date {
            color: #6c757d;
            font-weight: normal;
        }

        .calendar .selected-date {
            background-color: #28a745;
            color: #ffffff;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
        }

        .legend {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .legend div {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .legend div span {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }

        .legend .practice span {
            background-color: #28a745;
        }

        .legend .no-practice span {
            background-color: #6c757d;
        }

        .time-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .time-container .btn {
            padding: 10px; 
            height: 50px;
            margin: 0; 
        }

        .time-container .btn {
            flex: 0 1 48%; 
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
            color: #6c757d;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-lg {
            width: 100%;
        }
    </style>