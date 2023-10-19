#include <bits/stdc++.h>
#define nMax 10
#define mMax 30

int n;
int M;
int y[ nMax + 1];
int w[ nMax + 1];
int v[ nMax + 1];
int F[ nMax + 1] [ mMax + 1];
int s[ nMax + 1] [ mMax + 1];
FILE *fp;
char finp[] = "Balo0n_QHD.inp";
char fout[] = "Balo0n_QHD.out";

int init ();
void TaoBangPhuongAn ();
void TruyVet ();
void Xuat ();

int main()
{
	if (!init())
	{
		printf("Khong tim thay tep: %s", finp);
		exit(1);
	}
	TaoBangPhuongAn();
	TruyVet();
	Xuat();
}

int init ()
{
	int i;
	if((fp = fopen(finp,"r")) !=NULL)
	{
		fscanf(fp," %d %d \n", &n , &M);
		for ( i= 1; i<=n;i++)
		{
			fscanf(fp,"%d", &v[i]);
		}
		fscanf(fp,"\n");
		for (i= 1; i<=n;i++)
		{	
			fscanf(fp,"%d", &w[i]);
		}
		fclose(fp);
		return 1 ;
		
	}
	else return 0;
}

void TaoBangPhuongAn()
{
	int L , i, k;
	for (L=0; L<=M; L++) F[0] [L] = 0;
	for (i=0; i<=n; i++) F[i] [0] = 0;
	for (i=1; i<=n; i++)
	{
	    for (L=1;L<=M;L++)
	    {
	    	F[i] [L] = F[i-1] [L];
	    	s[i] [L] = 0;
	    	if (L >= w[i])
	    	for (k = 1; k <= L/w[i]; k++)
	    	if (F[i] [L] < F[i-1] [L-w[i]*k] + v[i]*k)
	    	{
	    		F[i] [L] = F[i-1] [L-w[i]*k] + v[i]*k;
	    		s[i] [L] = k;
			}
		}
    }
}

void TruyVet()
{
	int i, L ;
	i = n;
	L = M;
	while (i > 0)
	{
		y[i] = s[i] [L] ;
		L= L - y[i] * w[i];
		i= i-1;
	}
}

void Xuat()
{
	int i, L ;
	if ((fp = fopen(fout,"w")) != NULL)
	{
		fprintf(fp,"F[i,L]"); fprintf(fp,"\n");
		fprintf(fp,"  ");
		for (L = 1;L <= M ;L++) fprintf(fp,"%3d", L);
		fprintf(fp,"\n");
		for (i = 1; i <= n; i++)
		{
			fprintf (fp,"%2d",i);
			for (L=  1; L <= M; L++) fprintf(fp,"%3d", F[i] [L] ) ;
			fprintf(fp,"\n");
		}
		fprintf(fp,"\n");
		
		fprintf(fp,"s[i,L]"); fprintf(fp,"\n");
		fprintf(fp,"  ");
		for (L = 1; L <= M; L++) fprintf(fp,"%3d", L );
		fprintf(fp,"\n");
		for (i = 1; i <= n; i++)
		{
			fprintf (fp,"%2d",i);
			for (L = 1; L <= M; L++) fprintf(fp,"%3d", s[i] [L] ) ;
			fprintf(fp,"\n");
		}
		fprintf(fp,"\n");
		
		fprintf(fp, "Gia tri lon nhat: %4d \n",F[n] [M]);
		
		fprintf(fp, "Loai do vat duoc chon:");
		    for (i = 1; i <= n; i++)
			if(y[i] > 0) fprintf(fp, "%3d", i);
			fprintf(fp,"\n");
		
		fprintf(fp, "So luong duoc chon:   ");
			for (i = 1; i <= n; i++)
			if(y[i] > 0) fprintf(fp,"%3d", y[i]);
			fclose(fp);
	}
	else printf("Khong tim thay tep: %s",fout);
}
