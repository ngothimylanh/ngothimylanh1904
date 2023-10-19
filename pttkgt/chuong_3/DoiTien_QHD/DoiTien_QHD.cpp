#include<bits/stdc++.h>
#define nMax 10
#define mMax 30
#define Infinity 100000

int n;
int S;
int t[nMax + 1];
int u[nMax + 1];
int a[nMax + 1];
int x[nMax + 1];
FILE *fp;
char finp[] = "DoiTien_QHD.inp";
char fout[] = "DoiTien_QHD.out";

int init();
void DoiTien();
void TruyVet();
void Xuat();

int main()
{
	if (!init())
	{
		printf("Khong tim thay tep: %s", finp);
		exit(1);
	}
	DoiTien();
	TruyVet();
	Xuat();
}

int init ()
{
	int k;
	if((fp = fopen(finp,"r")) != NULL)
	{
		fscanf(fp," %d %d \n", &n ,&S);
		for (k = 1; k <= n; k++)
		{
			fscanf(fp,"%d", &a[k]);
		}
		fscanf(fp,"\n");
		fclose(fp);
		return 1 ;
		
	}
	else return 0;
}

void DoiTien()
{
	int i, k;
	t[0] = 0;
	for(i = 1; i <= S; i++) 
	{
		t[i] = + Infinity; 
		u[i] = 0;
	}
	for(i = 1; i <= S; i++)
	{
		for(k = 1; k <= n; k++)
		{
			if ((i >= a[k]) && ((1 + t[i - a[k]]) < t[i]))
			{
				t[i] = 1 + t[i-a[k]]; 
				u[i] = k;
			}
		}
	}
}

void TruyVet()
{
	int i, k;
	if (t[S] != Infinity)
	{
		i = S;
		while (i > 0)
		{
			k = u[i];
			x[k]++;
			i = i - a[k];
		}
	}
}

void Xuat()
{
	int i, L, k ;
	if ((fp = fopen(fout,"w")) != NULL)
	{
		fprintf(fp,"Bang phuong an:"); 
		fprintf(fp,"\n");
		fprintf(fp,"   ");
		
		for (i = 1; i <= S; i++) fprintf(fp,"%3d", i);		
		fprintf(fp,"\n");
		fprintf(fp," t ");
		
		for (i = 1; i <= S; i++) fprintf(fp,"%3d", t[i]);
		fprintf(fp,"\n");
		fprintf(fp," u ");
		
		for (i=1;i<=S;i++) fprintf(fp,"%3d", u[i]);
		fprintf(fp,"\n");
		fprintf(fp,"\n");
		
		fprintf(fp,"So to tien it nhat:");
		fprintf(fp,"%3d",t[S]);
		fprintf(fp,"\n");
		
		fprintf(fp,"Loai tien duoc chon:");
		for (k=1;k<=n;k++) 
		{
			if(x[k]>0) fprintf(fp, "%3d",k);
		}
		fprintf(fp,"\n");
		
		fprintf(fp,"So luong duoc chon: ");
		for (k=1;k<=n;k++) 
		{
			if(x[k]>0) fprintf(fp, "%3d",x[k]);
		}
		fprintf(fp,"\n");
		fclose(fp);
	}
	else printf("Khong tim thay tep: %s",fout);
}
