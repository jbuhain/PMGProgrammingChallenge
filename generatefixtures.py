#!/usr/bin/env python3

import csv
import hashlib
import os.path as path
import random

import pandas as pd


DIR = path.abspath(path.dirname(__file__))
FILES = {
    'clothing.csv': ('Blouses', 'Shirts', 'Tanks', 'Cardigans', 'Pants', 'Capris', '"Gingham" Shorts',),
    'accessories.csv': ('Watches', 'Wallets', 'Purses', 'Satchels',),
    'household_cleaners.csv': ('Kitchen Cleaner', 'Bathroom Cleaner',),
}


def write_file(writer, length, categories):
    writer.writerow(['email_hash', 'category'])
    for i in range(0, length):
        writer.writerow([
            hashlib.sha256('tech+test{}@pmg.com'.format(i).encode('utf-8')).hexdigest(),
            random.choice(categories),
        ])


def main():
    # For writing large > 2gb file for test cases mentioned. 
    # Updates accessories.csv, clothing.csv, and household_cleaners.csv to 2gb files
    # 
    # for fn, categories in FILES.items():
    #     with open(path.join(DIR, 'fixtures', fn), 'w', encoding='utf-8') as fh:
    #         write_file(
    #             csv.writer(fh, doublequote=False, escapechar='\\', quoting=csv.QUOTE_ALL),
    #             1000000000,
    #             categories
    #         )

    for fn, categories in FILES.items():
        with open(path.join(DIR, 'fixtures', fn), 'w', encoding='utf-8') as fh:
            write_file(
                csv.writer(fh, doublequote=False, escapechar='\\', quoting=csv.QUOTE_ALL),
                random.randint(3, 15),
                categories
            )
   


if __name__ == '__main__':
    main()
