_DIR=$(dirname $(readlink -f $0)) # récupère le dossier du script

pd -noaudio $_DIR/video_player.pd &
sleep 2
pd -nrt -noprefs $_DIR/audio_player.pd &
sleep 2
chromium-browser --kiosk http://127.0.0.1