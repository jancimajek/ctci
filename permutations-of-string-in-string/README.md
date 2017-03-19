Problem from video CtFBCI:The Approach

Find permutations of string S in string B

 - String B is longer than string S
 - Find all permutations and their positions in B

# BF [O(S!)]
 - Find all permutations of S
 - Search through B and match with permutations from step 1

# OPT1 [O(B*S)]
 - Go through all substrings of B of length strlen(S) [O(B)]
 - Check if each substring is permutation of S [O(S)]

# OPT2 [O(B*S)]
 - Go through all substrings of B of length strlen(S) [O(B)]
 - Check if each substring is permutation of S [O(S)]
    - Have we checked this substring already, i.e. is it in MEMO table?
    - Is permutation?
       - If we don't have CHAR_COUNT hash table for S --> create one
       - Go through the substring and decrement counts in CHAR_COUNT table
          - If we find one that is not in hash table or is already 0 --> NOT A PERMUTATION
       - If we went through the entire substring --> IS PERMUTATION
    - Store result in MEMO hash table
