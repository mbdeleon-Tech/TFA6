$ErrorActionPreference = 'Stop'
Set-Location -LiteralPath $PSScriptRoot
$localPhp = Join-Path $PSScriptRoot '..\..\work\php\php.exe'
if (Test-Path -LiteralPath $localPhp) {
    $phpExecutable = (Resolve-Path -LiteralPath $localPhp).Path
} else {
    $phpExecutable = (Get-Command php -ErrorAction Stop).Source
}
if (-not (Test-Path -LiteralPath 'vendor\autoload.php')) {
    throw 'Install project dependencies with composer install first. See README.md.'
}
if (-not (Test-Path -LiteralPath '.env')) {
    Copy-Item -LiteralPath '.env.example' -Destination '.env'
    & $phpExecutable artisan key:generate
    if ($LASTEXITCODE -ne 0) { throw 'Application key generation failed.' }
}
& $phpExecutable artisan serve --host=127.0.0.1 --port=8000
