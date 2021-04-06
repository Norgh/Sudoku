#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include <time.h>

#define GRID 9 // The grid is 9x9
#define MIN 1 // Lowest value in a Sudoku
#define MAX 9 // Highest value in a Sudoku
#define TRUE 1 // return value of the function if all's good
#define FALSE 0// return value of the function if it didn't end well

int Grid[GRID][GRID]; // Sudoku Grids to use the functions
int GridSolv[GRID][GRID];
int Grille[GRID][GRID];
int GridHelp[GRID][GRID];

int is_cell_empty(int sudoku[GRID][GRID], int* ro, int* co) // Checking if a cell is empty (=0) or not
{
	for (*ro = 0; *ro < GRID; (*ro)++) {
		for (*co = 0; *co < GRID; (*co)++) {
			if (sudoku[*ro][*co] == 0) {
				return TRUE; 
			}
		}
	}
	return FALSE;
}

int verif_row(int sudoku[GRID][GRID], int value, int ro, int co) // Checking if the number is already present on the line
{

	for (co = 0; co < GRID; co++)   
	{                            
		if (sudoku[ro][co] == value)
		{
			return FALSE;
		}
	}
	return TRUE;
}


int verif_col(int sudoku[GRID][GRID], int value, int ro, int co) // Checking if the number is already present on the column
{
	for (ro = 0; ro < GRID; ro++)
	{
		if (sudoku[ro][co] == value)
		{
			return FALSE;
		}
	}
	return TRUE;
}


int verif_mat(int sudoku[GRID][GRID], int value, int ro, int co) // Checking if the number is already present on the block
{
	int i, j;
	int robeginning = (ro / 3) * 3;    // A square (=block) is 3x3
	int cobeginning = (co / 3) * 3;    // That's why we take the row and the line % 3
	for (i = robeginning; i < robeginning + 3; i++)
	{
		for (j = cobeginning; j < cobeginning + 3; j++) 
		{
			if (sudoku[i][j] == value)
				return FALSE;
		}
	}
	return TRUE;
}


int is_over(int sudoku[GRID][GRID]) // Checking if the Sudoku is fully completed or not
{
	int ro, co;
	for (ro = 0; ro < GRID; ro++) {
		for (co = 0; co < GRID; co++) {
			if (sudoku[ro][co] == 0) {
				return FALSE;
			}
		}
	}
	return TRUE;
}

int sudoku_solv(int sudoku[GRID][GRID]) // The function to solve the sudoku : Placing numbers in empty cells after veryfying the conditions required in a Sudoku
{
	int value;
	int ro = 1;
	int co = 1;

	if (is_cell_empty(sudoku, &ro, &co) == TRUE)
	{
		for (value = 1; value <= GRID; value++)
		{
			if (verif_row(sudoku, value, ro, co) == TRUE && verif_col(sudoku, value, ro, co) == TRUE && verif_mat(sudoku, value, ro, co) == TRUE)
			{
				sudoku[ro][co] = value;
				sudoku_solv(sudoku);
				if (is_over(sudoku))
				{
					return TRUE;
				}
				sudoku[ro][co] = 0;
			}
		}
	}
	return FALSE;
}

int Randomize() // Creating a random number between 1 and 9
{               // to fill the grid
	int r = (int)(rand() % (MAX - MIN + 1) + MIN);
	return (int)r; // Returning the random value obtained
}

int Line(int li, int Grid[GRID][GRID]) // Checking if the number is present or not in the line
{
	int countL=0;
	for (int i = 0; i < MAX; i++)
	{
		if (Grid[li][i] != 0)
		{
			countL++;
		}
	}
	return countL;
}

int Column(int co, int Grid[GRID][GRID])// Checking if the number is present or not in the column
{
	int countC=0;
	for (int i = 0; i < MAX; i++)
	{
		if (Grid[i][co] != 0)
		{
			countC++;
		}
	}
	return countC;
}

int Block(int li, int co, int Grid[GRID][GRID])// Checking if the number is present or not in the block/square
{
	int countB = 0;
	int d = (li / 3) * 3;
	int e = (co / 3) * 3; 
	for (co = e; co < e + 3; co++) 
	{
		for (li = d; li < d + 3; li++) 
			if (Grid[li][co] != 0)
			{
				countB++;
			}
	}
	return countB;
}

int DeleteNumbers(int Grid[GRID][GRID], int GridSolv[GRID][GRID], int NbCasesToDelete) // A function to delete numbers to create a Grid solvable
{                                                                                      // We took the choice to start with a full grid from which we delete cases
	int x, y;
	int NbCasesDeleted = 0;
	while (NbCasesDeleted < NbCasesToDelete)
	{
		x = Randomize()-1; // A number between 0 and 8 to choose position in the grid[][]
		y = Randomize()-1;
		if (Grid[x][y] != 0 && Line(x, Grid) >= 1 && Column(y, Grid) >= 1 && Block(x, y, Grid) >= 1)
		{
			CopyGrid(Grid, GridSolv); // sudoku_solv fulfil the sudoku or we need to keep one empty so we copy it into another one
			GridSolv[x][y] = 0;
			if (sudoku_solv(GridSolv) == TRUE) // If ther'es still a solution, then we replace the location by a 0
			{ 
				Grid[x][y] = 0;
				NbCasesDeleted++;
			}
		}
	}
}

int CopyGrid(int Grid1[GRID][GRID], int Grid2[GRID][GRID]) // Simply copy a grid into another one
{
	for (int i = 0; i < MAX; i++)
	{
		for (int j = 0; j < MAX; j++)
		{
			Grid2[i][j] = Grid1[i][j];
		}
	}
}

int DisplayGrid(int Grid[GRID][GRID]) // This function has no meaning right now but was used to see what's inside a grid to find issues faced during the project
{
	int count=0;
	for (int i = 0; i < MAX; i++)
	{
		for (int j = 0; j < MAX; j++)
		{
			if (Grid[i][j] == 0)
			{
				count++;
			}
			printf("%d ", Grid[i][j]);
		}
		printf("\n");
	}
	printf("Nombre de zeros : %d\n", count);
}

int CreateGrid(int Grid[GRID][GRID], int pos) // Main creating function : Setting numbers at random pos if it suits with teh conditions, until the sudoku is full
{
	int random, posX, posY, count;
	int Vars[] = { 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 };

	if (pos == 81)
	{
		return 1;
	}
	posX = pos / 9;
	posY = pos % 9;

	for (random = 0; random < MAX; random++)
	{
		Vars[Grid[random][posX]] = 0;
		Vars[Grid[posY][random]] = 0;
		Vars[Grid[(posY / 3) * 3 + (random / 3)][(posX / 3) * 3 + (random % 3)]] = 0;
	}
	count = 0;
	for (random = 1; random <= MAX; random++)
	{
		if (Vars[random])
		{
			count++;
		}
	}

	while (count) 
	{
		random = Randomize();
		if (Vars[random] != 0) 
		{
			Grid[posY][posX] = random;
			if (CreateGrid(Grid, pos + 1))
			{
				return 1;
			}
			Vars[random] = 0;
			count--;
			Grid[posY][posX] = 0; 
		}
	}
	return 0;
}

void FileReader(int Grille[GRID][GRID], char* Name_file) // Reading a .txt file to extract the grid
{
	FILE* File;
	errno_t err = fopen_s(&File, Name_file, "r");
	char Read[10];
	int li = 0;
	int co = 0;
	int nombre=0;
	if (File != NULL)
	{
		fseek(File, 0, SEEK_SET);
		while (!feof(File))
		{
			fgets(Read, 10, File);
			nombre = atoi(Read);
			Grille[li][co] = nombre;
			co++;
			if (li  == 9)
			{
				li++;
				co = 0;
			}
		}
		fclose(File);
	}
}

void FileWriter(int Grid[GRID][GRID], char* Name_file) // Writting the new grid into a .txt to be read later on web using php
{
	FILE* File;
	errno_t err = fopen_s(&File, Name_file, "w+");

	char Buffer[10];
	char Line[] = "\n";
	if (File != NULL)
	{
		for (int i = 0; i < MAX; i++)
		{
			for (int j = 0; j < MAX; j++)
			{
				_itoa_s(Grid[i][j], Buffer, 10, 10);
				sprintf_s(Buffer, 10, Buffer);
				fputs(Buffer, File);
				fputs(Line, File);
			}
		}
		fclose(File);
	}
}

void FileWriterForEditor(int Grid[GRID][GRID], char* Name_file) // Another function, almost the same, but for another text with different conditions :
{																// All the 81 numbers in only one line to be stocked in the database
	FILE* File;
	errno_t err = fopen_s(&File, Name_file, "w+");

	char Buffer[10];
	if (File != NULL)
	{
		for (int i = 0; i < MAX; i++)
		{
			for (int j = 0; j < MAX; j++)
			{
				_itoa_s(Grid[i][j], Buffer, 10, 10);
				sprintf_s(Buffer, 10, Buffer);
				fputs(Buffer, File);
			}
		}
		fclose(File);
	}
}

void SolvedOrNot(int solved, char* Name_file) // Write in a .txt if there's a solution or not, used to know if, on the web, the user has done a solvable sudoku
{
	FILE* File;
	errno_t err = fopen_s(&File, Name_file, "w+");
	char Buffer[10];
	if (File != NULL)
	{
		_itoa_s(solved, Buffer, 10, 10);
		sprintf_s(Buffer, 10, Buffer);
		fputs(Buffer, File);
		fclose(File);
	}
}

int CasesToDelete(char* file_name) // Reading the file set with php that tells us how many cases to delete in the grid, depending on the difficulty : Beginner, Medium or Expert
{
	FILE* File;
	errno_t err = fopen_s(&File, file_name, "r");
	char Read[20];
	int arg = 0;
	if (File != NULL)
	{
		fseek(File, 0, SEEK_SET);
		fgets(Read, 20, File);
		arg = atoi(Read);
		fclose(File);
	}
	return arg;
}

int FileState(char* file_name) // State is used to choose what mode of execution will be set to the .c code : read main for more info
{
	FILE* File;
	errno_t err = fopen_s(&File, file_name, "r");
	char Read[20];
	int state = 0;
	if (File != NULL)
	{
		fseek(File, 0, SEEK_SET);
		fgets(Read, 20, File);
		state = atoi(Read);
		fclose(File);
	}
	return state;
}

int Test(int Grid[9][9]) // Check that all the grid is full, with each number present 1 time per line, column and block
{
	int countL=0;
	int countC=0;
	int countB=0;
	int e;
	int f;
	for (int j = 0; j < MAX; j++)
	{
		for (int nb = 1; nb < 10; nb++)
		{
			countL = 0;
			countC = 0;
			countB = 0;
			for (int i = 0; i < MAX; i++)
			{
				if (Grid[j][i] == nb)
				{
					countL++;
				}
			}
			for (int i = 0; i < MAX; i++)
			{
				if (Grid[i][j] == nb)
				{
					countC++;
				}
			}
			for (int i = 0; i < MAX; i++)
			{
				e = (i / 3) * 3;
				f = (j / 3) * 3;
				for (int d = f; d < f + 3; d++)
				{
					for (int c = e; c < e + 3; c++)
					{
						if (Grid[c][d] == nb)
						{
							countB++;
						}
					}
				}
			}
			if (countB != 9 || countC != 1 || countL != 1)
			{
				return FALSE;
			}
		}
	}
	return TRUE;
}

int Solvable(int Grid[9][9]) // Verify that any number 1-9 isn't present 2 times per line or column (not blocks due to a problem which is solved using another function)
{
	int countL = 0;
	int countC = 0;
	int e;
	int f;
	for (int j = 0; j < MAX; j++)
	{
		for (int nb = 1; nb < 10; nb++)
		{
			countL = 0;
			countC = 0;
			for (int i = 0; i < MAX; i++)
			{
				if (Grid[j][i] == nb)
				{
					countL++;
				}
			}
			if (countL > 1)
			{
				return FALSE;
			}
			for (int i = 0; i < MAX; i++)
			{
				if (Grid[i][j] == nb)
				{
					countC++;
				}
			}
			if (countC > 1)
			{
				return FALSE;
			}
		}
	}
	return TRUE;
}

void RandomHelp(int Solved[GRID][GRID], int Help[GRID][GRID]) // When help is called, it fulfil a case with a number (not random but still help)
{
	int h = 0;
	int x;
	int y;
	for (int x = 0; x < MAX; x++)
	{
		for (int y = 0; y < MAX; y++)
		{
			if (Help[x][y] == 0)
			{
				Help[x][y] = Solved[x][y];
				return TRUE;
			}
		}
	}
}

int main() {
	srand(time(NULL)); // Perfect random number doesn't exist so we use the current time
	int state = FileState("State.txt"); // State is used to decide what to execute : creating a grid, verifying if a grid is solvable, veryfying if there's a solution, etc.
	if (state == 0) // Create a random Grid Solvable
	{
		CreateGrid(Grid, 0);
		FileWriter(Grid, "SudokuFull.txt");
		CopyGrid(Grid, GridSolv);
		DeleteNumbers(Grid, GridSolv, CasesToDelete("arg.txt"));
		FileWriter(Grid, "SudokuEmpty.txt"); 
	}
	if (state == 1) // Veryfi if the grid entered is solvable
	{
		FileReader(Grille, "SudokuSolved.txt");
		if (Test(Grille) == TRUE)
		{
			SolvedOrNot(1, "Soluce.txt");
		}
		else
		{
			SolvedOrNot(0, "Soluce.txt");
		}
	}
	if (state == 2) // Giving help by adding 1 number to the current grid 
	{
		FileReader(GridHelp, "SudokuHelp.txt");
		FileReader(Grille, "SudokuHelp.txt");
		if (Solvable(GridHelp) == TRUE)
		{
			if (sudoku_solv(GridHelp) == TRUE)
			{
				RandomHelp(GridHelp, Grille);
				FileWriter(Grille, "SudokuEmpty.txt");
				FileWriter(Grille, "SudokuHelp.txt");
				SolvedOrNot(1, "help.txt");
			}
			else
			{
				SolvedOrNot(0, "help.txt");
			}
		}
		else 
		{
			SolvedOrNot(0, "help.txt");
		}
	}
	if (state == 3) // For the editor mode, tells us if the grid made by the user is solvable
	{
		FileReader(Grille, "Editor.txt");
		CopyGrid(Grille, GridHelp);
		if (Solvable(GridHelp) == TRUE)
		{
			if (sudoku_solv(GridHelp) == TRUE)
			{
				SolvedOrNot(1, "EditorState.txt");
				FileWriterForEditor(Grille, "YourSudoku.txt");
			}
			else
			{
				SolvedOrNot(0, "EditorState.txt");
			}
		}
		else
		{
			SolvedOrNot(0, "EditorState.txt");
		}
	}
}