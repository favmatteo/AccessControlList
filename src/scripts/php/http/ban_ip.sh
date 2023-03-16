#!/bin/bash

LOG="/var/log/block.log"
echo "$(date): $1" >> "$LOG"