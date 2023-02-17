#!/bin/bash

LOG_FILE="/var/log/block.log"
echo "$(date): $1" >> "$LOG_FILE"