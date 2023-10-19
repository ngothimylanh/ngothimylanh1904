#include<bits/stdc++.h>
#define Max 50 

int n, m;
char x[Max];
char y[Max];
char z[Max];
int f[Max+1] [Max+1];
FILE *fp;
char finp [] = "SEQUENCE_QHD.inp";
char fout [] = "SEQUENCE_QHD.out";

int init();
void TaoBangPhuongAn();
void TruyVet();
void Xuat();

int main()
{
	if (!init())
	{
		printf(" Khong tim thay file: %s", finp);
		exit (1);
	}
	TaoBangPhuongAn();
	TruyVet();
	Xuat();
}

int init()
{
	int i;
	if ((fp = fopen(finp,"r")) != NULL)
	{
		fscanf(fp, "%s \n", x);
		fscanf(fp, "%s ", y);
		fclose(fp);
		m = strlen(x);
		n = strlen(y);
		return 1;
	}
	else return 0;
}

void TaoBangPhuongAn()
{
	int i, j;
	for (i=0;i<m;i++)
	{
		f[i] [0] =0;
	}
	for (j=0;j<n;j++)
	{
		f[0] [j] =0;
	}
	for (i=0;i<m;i++)
	{
		for (j=0;j<n;j++)
		{
			if (x[i]==y[j]) f[i+1] [j+1] = f[i] [j] + 1;
		    else 
		    {
				if (f[i] [j+1] > f[i+1] [j]) f[i+1] [j+1] = f[i] [j+1];
		    	else f[i+1] [j+1] = f[i+1]  [j];
		    }
		}
	}
}

void TruyVet()
{
	int row , col , k;
	row = m;
	col = n;
	k = f[m] [n];
	while ((row > 0)&&(col > 0))
	{
		if (x[row - 1] == y[col - 1])
		{
			k--;
			z[k] = x[row - 1];
			row = row - 1;
			col = col - 1;
		}
		else
		{
			if (f[row] [col] == f[row - 1] [col])
				row = row - 1;
			else
				col = col -1;
		}
	}
}

void Xuat()
{
	int i , j;
	if ((fp = fopen(fout, "w")) != NULL)
	{
		fprintf(fp," F[i,j]") ; 
		fprintf(fp, "\n");
		fprintf(fp, "  ");
		for (j = 1;j <= n; j++) fprintf (fp, "%3d", j);
		fprintf (fp, "\n");
		for (i = 1;i <= m; i++)
		{
			fprintf (fp,"%2d", i);
			for (j = 1;j <= n; j++) fprintf (fp, "%3d",f[i] [j]);
			fprintf (fp, "\n");
    	}
    	fprintf (fp, "\n");
    	
    	fprintf (fp,"Do dai lon nhat:%2d \n", f[m] [n]);
    	fprintf (fp,"Day con chung dai nhat: %s", z);
    	fclose(fp);
	}
	else printf ("Khong tim thay tep: %s", fout);
}
