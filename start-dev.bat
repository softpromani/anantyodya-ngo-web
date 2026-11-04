@echo off
echo ========================================================
echo  Starting Anantyodya Welfare Foundation (Laravel + Inertia Vue 3)
echo ========================================================
echo.
echo [1/2] Launching Laravel Server at http://127.0.0.1:8000 ...
start "Laravel Server" cmd /k "php artisan serve --port=8000"

echo [2/2] Launching Vite Dev Server for Vue 3 ...
start "Vite Dev Server" cmd /k "npm run dev"

echo.
echo Application started! Open in your browser:
echo -> http://127.0.0.1:8000
echo.
echo Press any key to close this launcher window...
pause > nul
